@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <a href="{{ route('mahasiswa.index') }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">← Kembali ke daftar</a>
                <h1 class="mt-3 text-2xl font-bold tracking-tight text-slate-900">Detail Mahasiswa</h1>
            </div>
            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="inline-flex justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">
                Edit Data
            </a>
        </div>

        @if (session('success'))
            <div role="status" class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <dl class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="grid gap-1 border-b border-slate-100 px-6 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">NIM</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $mahasiswa->nim }}</dd>
            </div>
            <div class="grid gap-1 border-b border-slate-100 px-6 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Nama</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $mahasiswa->nama }}</dd>
            </div>
            <div class="grid gap-1 border-b border-slate-100 px-6 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Program Studi</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $mahasiswa->prodi }}</dd>
            </div>
            <div class="grid gap-1 px-6 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Semester</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $mahasiswa->semester }}</dd>
            </div>
        </dl>
    </div>
@endsection
