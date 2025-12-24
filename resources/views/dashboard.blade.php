@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <span class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-calendar-alt"></i> {{ date('d F Y') }}
            </span>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Surat</h6>
                        <h2>{{ $totalSurat }}</h2>
                    </div>
                    <i class="fas fa-envelope fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Surat Masuk</h6>
                        <h2>{{ $totalSuratMasuk }}</h2>
                    </div>
                    <i class="fas fa-inbox fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Surat Keluar</h6>
                        <h2>{{ $totalSuratKeluar }}</h2>
                    </div>
                    <i class="fas fa-paper-plane fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Hari Ini</h6>
                        <h5>Masuk: {{ $suratMasukHariIni }}</h5>
                        <h5>Keluar: {{ $suratKeluarHariIni }}</h5>
                    </div>
                    <i class="fas fa-calendar-day fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-history me-1"></i> Surat Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($suratTerbaru as $surat)
                            <tr>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ Str::limit($surat->perihal, 30) }}</td>
                                <td>
                                    <span class="badge {{ $surat->jenis_surat == 'Masuk' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $surat->jenis_surat }}
                                    </span>
                                </td>
                                <td>{{ $surat->tanggal_surat->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada surat</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i> Statistik Bulan Ini
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Surat Masuk</h5>
                                <h2 class="text-success">{{ $suratMasukBulanIni }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Surat Keluar</h5>
                                <h2 class="text-danger">{{ $suratKeluarBulanIni }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('surat.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Lihat Semua Surat
                    </a>
                    <a href="{{ route('surat.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Surat
                    </a>
                    <a href="{{ route('surat.laporan') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-chart-bar"></i> Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection