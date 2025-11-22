@extends('layouts.admin')

@section('title', 'Riwayat Informasi Kelulusan')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Riwayat Informasi Penerimaan Calon Santri Pesantren Al-Falah Putak</h1>
        </div>

        <!-- Toolbar -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-auto">
                        <h6 class="mb-0 fw-semibold text-dark">Riwayat Informasi Penerimaan Calon Santri {{ $jenjangLabel }}</h6>
                    </div>
                    <div class="col-12 col-lg ms-lg-auto">
                        <form method="GET" action="{{ route('admin.kelulusan.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
                            <input type="hidden" name="jenjang" value="{{ $jenjang }}">
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
                                    <li><a class="dropdown-item {{ $jenjang == 'mi' ? 'active' : '' }}" href="{{ route('admin.kelulusan.index', ['jenjang' => 'mi']) }}">Madrasah Ibtidaiyyah</a></li>
                                    <li><a class="dropdown-item {{ $jenjang == 'mts' ? 'active' : '' }}" href="{{ route('admin.kelulusan.index', ['jenjang' => 'mts']) }}">Madrasah Tsanawiyyah</a></li>
                                    <li><a class="dropdown-item {{ $jenjang == 'ma' ? 'active' : '' }}" href="{{ route('admin.kelulusan.index', ['jenjang' => 'ma']) }}">Madrasah Aliyah</a></li>
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
                                <th class="px-4 py-3 fw-semibold text-dark border-0">ID_Penerimaan</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Tanggal</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Total Diterima</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Total Ditolak</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Admin</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $r)
                                <tr>
                                    <td class="px-4 py-3 border-0">idp{{ $r->id_penerimaan }}</td>
                                    <td class="px-4 py-3 border-0">{{ $r->created_at ? $r->created_at->format('d-m-Y') : '-' }}</td>
                                    <td class="px-4 py-3 border-0">
                                        {{ $r->total_diterima > 0 ? $r->total_diterima : '-' }}
                                    </td>
                                    <td class="px-4 py-3 border-0">
                                        {{ $r->total_ditolak > 0 ? $r->total_ditolak : '-' }}
                                    </td>
                                    <td class="px-4 py-3 border-0">{{ $r->admin->name ?? '-' }}</td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.kelulusan.show', $r->id_penerimaan) }}" class="btn btn-link text-decoration-none p-0" title="Lihat Detail">
                                                <i class="fas fa-eye text-success" style="font-size: 1.1rem;"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-decoration-none p-0" title="Edit">
                                                <i class="fas fa-edit text-success" style="font-size: 1.1rem;"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Tidak ada riwayat penerimaan untuk jenjang ini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($riwayat->hasPages())
                    <div class="card-footer border-0 bg-white px-4 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $riwayat->firstItem() ?? 0 }} sampai {{ $riwayat->lastItem() ?? 0 }} dari {{ $riwayat->total() }} data
                            </div>
                            <nav>
                                {{ $riwayat->links() }}
                            </nav>
                        </div>
                    </div>
                @endif
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
        .pagination {
            margin-bottom: 0;
        }
        .pagination .page-link {
            color: #129990;
            border-color: #dee2e6;
        }
        .pagination .page-item.active .page-link {
            background-color: #129990;
            border-color: #129990;
        }
        .pagination .page-link:hover {
            color: #0d7377;
            background-color: #e7f5f4;
        }
    </style>
@endpush

