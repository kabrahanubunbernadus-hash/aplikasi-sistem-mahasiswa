@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Data Mahasiswa</h1>
            <p class="mt-1 text-sm text-slate-600">Kelola data mahasiswa dengan mudah.</p>
        </div>
        <a href="{{ route('mahasiswa.create') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Tambah Mahasiswa
        </a>
    </div>

    @if (session('success'))
        <div role="status" class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        @if ($mahasiswas->isEmpty())
            <div class="px-6 py-14 text-center">
                <h2 class="text-lg font-semibold text-slate-900">Belum ada data mahasiswa</h2>
                <p class="mt-2 text-sm text-slate-600">Tambahkan data pertama untuk mulai mengelola daftar mahasiswa.</p>
                <a href="{{ route('mahasiswa.create') }}" class="mt-5 inline-flex rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">
                    Tambah Mahasiswa
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-semibold">NIM</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Nama</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Program Studi</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Semester</th>
                            <th scope="col" class="px-6 py-3 text-right font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4 font-medium text-slate-900">{{ $mahasiswa->nim }}</td>
                                <td class="px-6 py-4 text-slate-700">{{ $mahasiswa->nama }}</td>
                                <td class="px-6 py-4 text-slate-700">{{ $mahasiswa->prodi }}</td>
                                <td class="px-6 py-4 text-slate-700">{{ $mahasiswa->semester }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="font-medium text-indigo-700 hover:text-indigo-900">Detail</a>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="font-medium text-slate-600 hover:text-slate-900">Edit</a>
                                        <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa) }}" onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-rose-700 hover:text-rose-900">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($mahasiswas->hasPages())
                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $mahasiswas->links() }}
                </div>
            @endif
        @endif
    </section>
@endsection
