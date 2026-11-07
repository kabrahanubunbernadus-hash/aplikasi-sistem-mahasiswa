<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Data Mahasiswa') | Sistem Informasi Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo-kampus-baru.png') }}"
     alt="Logo Politeknik Amamapare Timika"
     width="56"
     height="56"
     class="size-14 shrink-0 object-contain">
                <span class="flex flex-col">
                    <span class="font-bold tracking-wide text-teal-800">KAMPUS</span>
                    <span class="text-xs font-medium text-slate-600">Sistem Informasi Mahasiswa</span>
                </span>
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-700">
                Data mahasiswa
            </a>
        </nav>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>
</body>
</html>
