<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="nim" class="mb-1.5 block text-sm font-medium text-slate-700">NIM</label>
        <input id="nim" name="nim" type="text" value="{{ old('nim', $mahasiswa->nim) }}" required maxlength="50" autocomplete="off" class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
        @error('nim')
            <p class="mt-1.5 text-sm text-rose-700">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="nama" class="mb-1.5 block text-sm font-medium text-slate-700">Nama</label>
        <input id="nama" name="nama" type="text" value="{{ old('nama', $mahasiswa->nama) }}" required maxlength="255" autocomplete="name" class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
        @error('nama')
            <p class="mt-1.5 text-sm text-rose-700">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="prodi" class="mb-1.5 block text-sm font-medium text-slate-700">Program Studi</label>
        <input id="prodi" name="prodi" type="text" value="{{ old('prodi', $mahasiswa->prodi) }}" required maxlength="255" class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
        @error('prodi')
            <p class="mt-1.5 text-sm text-rose-700">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="semester" class="mb-1.5 block text-sm font-medium text-slate-700">Semester</label>
        <input id="semester" name="semester" type="number" value="{{ old('semester', $mahasiswa->semester) }}" required min="1" max="14" class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
        @error('semester')
            <p class="mt-1.5 text-sm text-rose-700">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
    <a href="{{ route('mahasiswa.index') }}" class="inline-flex justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
        Batal
    </a>
    <button type="submit" class="inline-flex justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        {{ $submitLabel }}
    </button>
</div>
