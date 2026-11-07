<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_lists_students_and_escapes_user_content(): void
    {
        $mahasiswa = $this->createMahasiswa([
            'nama' => '<script>alert(1)</script>',
        ]);

        $response = $this->get('/');

        $response->assertOk()
            ->assertSee($mahasiswa->nim)
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_home_page_displays_the_campus_logo(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('src="'.asset('logo-kampus.svg').'"', false)
            ->assertSee('alt="Logo kampus"', false);
    }

    public function test_student_forms_and_details_are_available(): void
    {
        $mahasiswa = $this->createMahasiswa();

        $this->get(route('mahasiswa.create'))->assertOk()->assertSee('Tambah Mahasiswa');
        $this->get(route('mahasiswa.edit', $mahasiswa))->assertOk()->assertSee('Edit Mahasiswa');
        $this->get(route('mahasiswa.show', $mahasiswa))->assertOk()->assertSee($mahasiswa->nama);
    }

    public function test_student_can_be_created_with_valid_data(): void
    {
        $response = $this->post(route('mahasiswa.store'), [
            'nim' => '2026001',
            'nama' => 'Ayu Lestari',
            'prodi' => 'Informatika',
            'semester' => 3,
        ]);

        $mahasiswa = Mahasiswa::query()->firstOrFail();

        $response->assertRedirect(route('mahasiswa.show', $mahasiswa));
        $this->assertDatabaseHas('mahasiswas', [
            'id' => $mahasiswa->id,
            'nim' => '2026001',
            'nama' => 'Ayu Lestari',
            'prodi' => 'Informatika',
            'semester' => 3,
        ]);
    }

    public function test_student_creation_requires_all_fields(): void
    {
        $response = $this->from(route('mahasiswa.create'))
            ->post(route('mahasiswa.store'), []);

        $response->assertRedirect(route('mahasiswa.create'))
            ->assertSessionHasErrors(['nim', 'nama', 'prodi', 'semester']);

        $this->assertDatabaseCount('mahasiswas', 0);
    }

    public function test_student_number_must_be_unique(): void
    {
        $this->createMahasiswa(['nim' => '2026001']);

        $response = $this->post(route('mahasiswa.store'), [
            'nim' => '2026001',
            'nama' => 'Mahasiswa Baru',
            'prodi' => 'Informatika',
            'semester' => 1,
        ]);

        $response->assertSessionHasErrors('nim');
        $this->assertDatabaseCount('mahasiswas', 1);
    }

    public function test_student_can_be_updated_without_changing_their_student_number(): void
    {
        $mahasiswa = $this->createMahasiswa(['nim' => '2026001']);

        $response = $this->put(route('mahasiswa.update', $mahasiswa), [
            'nim' => '2026001',
            'nama' => 'Nama Diperbarui',
            'prodi' => 'Sistem Informasi',
            'semester' => 5,
        ]);

        $response->assertRedirect(route('mahasiswa.show', $mahasiswa));
        $this->assertDatabaseHas('mahasiswas', [
            'id' => $mahasiswa->id,
            'nim' => '2026001',
            'nama' => 'Nama Diperbarui',
            'prodi' => 'Sistem Informasi',
            'semester' => 5,
        ]);
    }

    public function test_student_semester_must_be_between_one_and_fourteen(): void
    {
        $response = $this->post(route('mahasiswa.store'), [
            'nim' => '2026001',
            'nama' => 'Ayu Lestari',
            'prodi' => 'Informatika',
            'semester' => 15,
        ]);

        $response->assertSessionHasErrors('semester');
        $this->assertDatabaseCount('mahasiswas', 0);
    }

    public function test_student_can_be_deleted(): void
    {
        $mahasiswa = $this->createMahasiswa();

        $response = $this->delete(route('mahasiswa.destroy', $mahasiswa));

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseMissing('mahasiswas', ['id' => $mahasiswa->id]);
    }

    public function test_missing_student_returns_not_found(): void
    {
        $this->get(route('mahasiswa.show', 999999))->assertNotFound();
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function createMahasiswa(array $attributes = []): Mahasiswa
    {
        return Mahasiswa::create(array_merge([
            'nim' => '2026000',
            'nama' => 'Budi Santoso',
            'prodi' => 'Informatika',
            'semester' => 2,
        ], $attributes));
    }
}
