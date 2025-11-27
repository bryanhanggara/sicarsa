@extends('layouts.admin')

@section('title', 'Kelola Periode Penerimaan - Admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Kelola Periode Penerimaan</h1>
                <p class="text-muted mb-0">Manajemen periode dan kuota penerimaan santri baru</p>
            </div>
            <a href="{{ route('admin.periode.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Tambah Periode
            </a>
        </div>

        <!-- Alert Messages -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Table -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">No</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Tahun Periode</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0">Kuota Penerimaan</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Total Diterima</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Kuota Tersisa</th>
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($periodes as $periode)
                                @php
                                    $totalDiterima = $periode->riwayatPenerimaans->sum('total_diterima');
                                    $kuotaTersisa = $periode->kuota_penerimaan - $totalDiterima;
                                @endphp
                                <tr>
                                    <td class="px-4 py-3 border-0">{{ $loop->iteration + ($periodes->currentPage() - 1) * $periodes->perPage() }}</td>
                                    <td class="px-4 py-3 border-0">
                                        <span class="fw-semibold">{{ $periode->tahun_periode_penerimaan }}</span>
                                    </td>
                                    <td class="px-4 py-3 border-0">
                                        <span class="badge bg-info">{{ $periode->kuota_penerimaan }} siswa</span>
                                    </td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <span class="badge bg-success">{{ $totalDiterima }} siswa</span>
                                    </td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        @if($kuotaTersisa > 0)
                                            <span class="badge bg-primary">{{ $kuotaTersisa }} siswa</span>
                                        @else
                                            <span class="badge bg-danger">Penuh</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 border-0 text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.periode.show', $periode) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.periode.edit', $periode) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.periode.destroy', $periode) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus periode ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Belum ada periode penerimaan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($periodes->hasPages())
                    <div class="card-footer border-0 bg-white px-4 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $periodes->firstItem() ?? 0 }} sampai {{ $periodes->lastItem() ?? 0 }} dari {{ $periodes->total() }} data
                            </div>
                            <nav>
                                {{ $periodes->links() }}
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

