@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('mahasiswa.index') }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">← Kembali ke daftar</a>
            <h1 class="mt-3 text-2xl font-bold tracking-tight text-slate-900">Tambah Mahasiswa</h1>
            <p class="mt-1 text-sm text-slate-600">Isi informasi mahasiswa di bawah ini.</p>
        </div>

        <form method="POST" action="{{ route('mahasiswa.store') }}" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            @csrf
            @include('mahasiswa.form', ['submitLabel' => 'Simpan Mahasiswa'])
        </form>
    </div>
@endsection
