@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
    <div class="page-header" style="max-width: 720px; margin: 0 auto 24px auto;">
        <div class="page-title">
            <h1>{{ $pasien->nama }}</h1>
            <p>Detail data rekam medis pasien.</p>
        </div>

        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
            &larr; Kembali
        </a>
    </div>

    <div class="form-panel" style="max-width: 720px; margin: 0 auto;">
        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-y-3">
            <dt class="font-medium text-gray-500">Nomor Rekam Medis</dt>
            <dd class="sm:col-span-2 font-semibold">{{ $pasien->nomor_rekam_medis }}</dd>

            <dt class="font-medium text-gray-500">NIK</dt>
            <dd class="sm:col-span-2">{{ $pasien->nik }}</dd>

            <dt class="font-medium text-gray-500">Tanggal Lahir</dt>
            <dd class="sm:col-span-2">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }}</dd>

            <dt class="font-medium text-gray-500">Jenis Kelamin</dt>
            <dd class="sm:col-span-2">{{ $pasien->jenis_kelamin }}</dd>

            <dt class="font-medium text-gray-500">Nomor HP</dt>
            <dd class="sm:col-span-2">{{ $pasien->nomor_hp }}</dd>

            <dt class="font-medium text-gray-500">Alamat / Domisili</dt>
            <dd class="sm:col-span-2 whitespace-pre-line">{{ $pasien->alamat }}</dd>

            <dt class="font-medium text-gray-500">Nama Kontak Darurat</dt>
            <dd class="sm:col-span-2">{{ $pasien->nama_kontak }}</dd>

            <dt class="font-medium text-gray-500">No. Kontak Darurat</dt>
            <dd class="sm:col-span-2">{{ $pasien->nomor_kontak }}</dd>
        </dl>

        <div style="margin-top: 24px; display: flex; gap: 10px;">
            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
            @if (in_array(auth()->user()->role, ['admin', 'petugas']))
            <a href="{{ route('pasiens.edit', $pasien) }}" class="btn btn-primary">Edit Pasien</a>
            @endif
        </div>
    </div>
@endsection
