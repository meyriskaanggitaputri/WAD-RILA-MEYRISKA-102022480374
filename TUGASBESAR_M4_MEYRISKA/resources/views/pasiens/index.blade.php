@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h1>Data Pasien</h1>
            <p>Kelola data pasien, nomor rekam medis, kontak, dan riwayat.</p>
        </div>

        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="table-panel">
        <div class="table-heading">
            <h2>Daftar Pasien</h2>

            <div class="table-heading-right">
                <span class="count">{{ $pasiens->count() }} pasien</span>

                @if (in_array(auth()->user()->role, ['admin', 'petugas']))
                <a href="{{ route('pasiens.create') }}" class="btn btn-primary">
                    Tambah Pasien
                </a>
                @endif
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO. REKAM MEDIS</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>NOMOR HP</th>
                        <th>ALAMAT / DOMISILI</th>
                        <th>NAMA KONTAK DARURAT</th>
                        <th>NO. KONTAK DARURAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->nomor_rekam_medis }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->nik }}</td>
                            <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->nomor_hp }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->nama_kontak }}</td>
                            <td>{{ $pasien->nomor_kontak }}</td>
                            <td>
                                <div class="actions">
                                    @if (in_array(auth()->user()->role, ['admin', 'petugas']))
                                    <a href="{{ route('pasiens.edit', $pasien) }}" class="edit-button">Ubah</a>
                                    @endif
                                    @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('pasiens.destroy', $pasien) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Hapus</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="empty">Belum ada data pasien.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
