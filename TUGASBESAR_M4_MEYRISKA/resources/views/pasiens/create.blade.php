@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')
    <div class="page-header" style="max-width: 720px; margin: 0 auto 24px auto;">
        <div class="page-title">
            <h1>Tambah Pasien</h1>
            <p>Masukkan data pasien baru ke sistem klinik rawat jalan.</p>
        </div>

        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="form-panel" style="max-width: 720px; margin: 0 auto;">
        <form action="{{ route('pasiens.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nik">NIK (16 digit)</label>
                <input type="text" name="nik" id="nik" value="{{ old('nik') }}">
                @error('nik')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp') }}">
                @error('nomor_hp')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nomor_rekam_medis">Nomor Rekam Medis</label>
                <input type="text" name="nomor_rekam_medis" id="nomor_rekam_medis" value="{{ old('nomor_rekam_medis') }}">
                @error('nomor_rekam_medis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="alamat">Alamat / Domisili</label>
                <textarea name="alamat" id="alamat" rows="4">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nama_kontak">Nama Kontak Darurat</label>
                <input type="text" name="nama_kontak" id="nama_kontak" value="{{ old('nama_kontak') }}">
                @error('nama_kontak')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nomor_kontak">Nomor Kontak Darurat</label>
                <input type="text" name="nomor_kontak" id="nomor_kontak" value="{{ old('nomor_kontak') }}">
                @error('nomor_kontak')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
