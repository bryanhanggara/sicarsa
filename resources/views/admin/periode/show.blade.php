@extends('layouts.admin')

@section('title', 'Detail Periode - Admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Detail Periode Penerimaan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.periode.index') }}">Periode</a></li>
                        <li class="breadcrumb-item active">{{ $periode->tahun_periode_penerimaan }}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.periode.edit', $periode) }}" class="btn btn-warning text-white">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
                <a href="{{ route('admin.periode.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Tahun Periode</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $periode->tahun_periode_penerimaan }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Kuota Penerimaan</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $periode->kuota_penerimaan }} siswa</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Total Diterima</p>
                        @php
                            $totalDiterima = $periode->riwayatPenerimaans->sum('total_diterima');
                        @endphp
                        <h5 class="fw-bold text-success mb-0">{{ $totalDiterima }} siswa</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Kuota Tersisa</p>
                        @php
                            $kuotaTersisa = $periode->kuota_penerimaan - $totalDiterima;
                        @endphp
                        <h5 class="fw-bold {{ $kuotaTersisa > 0 ? 'text-primary' : 'text-danger' }} mb-0">
                            {{ $kuotaTersisa }} siswa
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Penerimaan -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 fw-semibold">Riwayat Penerimaan</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">ID Penerimaan</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Tanggal</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Admin</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Diterima</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Ditolak</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($periode->riwayatPenerimaans as $riwayat)
                                <tr>
                                    <td class="px-4 py-3 border-0">idp{{ str_pad($riwayat->id_penerimaan, 8, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-3 border-0">{{ $riwayat->created_at->format('d-m-Y H:i') }}</td>
                                    <td class="px-4 py-3 border-0">{{ $riwayat->admin->name ?? '-' }}</td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <span class="badge bg-success">{{ $riwayat->total_diterima }}</span>
                                    </td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <span class="badge bg-danger">{{ $riwayat->total_ditolak }}</span>
                                    </td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <a href="{{ route('admin.kelulusan.show', $riwayat) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Belum ada riwayat penerimaan untuk periode ini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table th {
            font-size: 0.875rem;
        }
        .table td {
            font-size: 0.9rem;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush

