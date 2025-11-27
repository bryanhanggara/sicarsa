@extends('layouts.admin')

@section('title', 'Detail Riwayat Penerimaan')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Riwayat Informasi Kelulusan Calon Santri Pesantren Al-Falah Putak</h1>
                <div class="d-flex align-items-center gap-2 mt-2">
                    <div style="width: 4px; height: 20px; background-color: #129990; border-radius: 2px;"></div>
                    <h6 class="mb-0 fw-semibold text-dark">Data Kelulusan Santri {{ $jenjangLabel }}</h6>
                </div>
            </div>
            <a href="{{ route('admin.kelulusan.index', ['jenjang' => $jenjang]) }}" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Summary Card -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">ID Penerimaan</p>
                        <h5 class="fw-bold text-dark mb-0">idp{{ $riwayat->id_penerimaan }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Tanggal</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $riwayat->created_at->format('d-m-Y') }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Total Diterima</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $riwayat->total_diterima }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Admin</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $riwayat->admin->name ?? '-' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toolbar -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-auto">
                        <h6 class="mb-0 fw-semibold text-dark">Daftar Santri</h6>
                    </div>
                    <div class="col-12 col-lg ms-lg-auto">
                        <form method="GET" action="{{ route('admin.kelulusan.show', $riwayat->id_penerimaan) }}" class="d-flex flex-wrap gap-2 align-items-center">
                            <div class="input-group" style="min-width: 200px; max-width: 300px;">
                                <input type="text" 
                                       name="search" 
                                       class="form-control" 
                                       placeholder="Search Here" 
                                       value="{{ $search }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.kelulusan.show', ['riwayatPenerimaan' => $riwayat->id_penerimaan, 'jenjang' => 'mi']) }}">Madrasah Ibtidaiyyah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.kelulusan.show', ['riwayatPenerimaan' => $riwayat->id_penerimaan, 'jenjang' => 'mts']) }}">Madrasah Tsanawiyyah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.kelulusan.show', ['riwayatPenerimaan' => $riwayat->id_penerimaan, 'jenjang' => 'ma']) }}">Madrasah Aliyah</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">ID_Pendaftaran</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Nama Lengkap</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">NIK</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Tempat Lahir</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Tanggal Lahir</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Data Diri</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($details as $detail)
                                @php
                                    $biodata = $detail->biodataSantri ?? null;
                                    $idPendaftaran = $biodata ? str_pad($biodata->id, 8, '0', STR_PAD_LEFT) : '-';
                                @endphp
                                @if($biodata)
                                    <tr>
                                        <td class="px-4 py-3 border-0">{{ $idPendaftaran }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->nama_lengkap }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->nik_calon_santri }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->tempat_lahir }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->tanggal_lahir ? $biodata->tanggal_lahir->format('d-m-Y') : '-' }}</td>
                                        <td class="px-4 py-3 border-0 text-center">
                                            <a href="{{ route('admin.santri.show', $biodata->id) }}" class="btn btn-link text-decoration-none p-0" title="Lihat Data Diri">
                                                <i class="fas fa-eye text-success" style="font-size: 1.1rem;"></i>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 border-0 text-center">
                                            @if($biodata->bukti_pembayaran)
                                                <a href="{{ Storage::url($biodata->bukti_pembayaran) }}" target="_blank" class="btn btn-link text-decoration-none p-0" title="Lihat Bukti Pembayaran">
                                                    <i class="fas fa-eye text-success" style="font-size: 1.1rem;"></i>
                                                </a>
                                            @else
                                                <span class="text-muted small">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Tidak ada data santri untuk riwayat ini.</p>
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

