@extends('layouts.admin')

@section('title', 'Verifikasi Data Calon Santri')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Verifikasi Data Calon Santri Pesantren Al-Falah Putak</h1>
        </div>

        <!-- Toolbar -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-auto">
                        <h6 class="mb-0 fw-semibold text-dark">Data Diri Pendaftar {{ $jenjangLabel }}</h6>
                    </div>
                    <div class="col-12 col-lg ms-lg-auto">
                        <form method="GET" action="{{ route('admin.verifikasi.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
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
                            <button type="button" class="btn btn-outline-secondary">
                                Filter
                            </button>
                            <button type="button"
                                    class="btn btn-success d-flex align-items-center gap-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verifikasiModal">
                                <i class="fas fa-user-check"></i>
                                <span>Verifikasi Data Calon Santri</span>
                            </button>
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($santri as $biodata)
                                @php
                                    $idPendaftaran = str_pad($biodata->id, 8, '0', STR_PAD_LEFT);
                                @endphp
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Semua data untuk jenjang ini sudah diverifikasi.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($santri->hasPages())
                    <div class="card-footer border-0 bg-white px-4 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $santri->firstItem() ?? 0 }} sampai {{ $santri->lastItem() ?? 0 }} dari {{ $santri->total() }} data
                            </div>
                            <nav>
                                {{ $santri->links() }}
                            </nav>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Verifikasi -->
    <div class="modal fade" id="verifikasiModal" tabindex="-1" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header border-0 pb-0">
                    {{-- <div>
                        <h5 class="modal-title fw-bold text-dark" id="verifikasiModalLabel">Daftar Calon Santri</h5>
                        <p class="text-muted small mb-0">Pilih data yang akan diverifikasi. Status akan berubah menjadi verified.</p>
                    </div> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="verifikasiForm" method="POST" action="{{ route('admin.verifikasi.approve') }}">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">

                            <!-- Kiri: Judul -->
                            <h4 class="mb-0 text-success">Data Santri</h4>
                        
                            <!-- Kanan: Search + Filter -->
                            <div class="d-flex align-items-center gap-2">
                        
                                <!-- Search -->
                                <div class="input-group" style="max-width: 280px;">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text"
                                           class="form-control border-start-0"
                                           placeholder="Search Here"
                                           value="{{ $search }}"
                                           disabled>
                                </div>
                        
                                <!-- Filter Button -->
                                <button type="button" class="btn btn-outline-secondary" style="min-width: 120px;">
                                    Filter <i class="fas fa-chevron-down ms-1"></i>
                                </button>
                        
                            </div>
                        
                        </div>
                        

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 40px;">
                                            <input type="checkbox" id="selectAllModal" class="form-check-input">
                                        </th>
                                        <th>ID_Pendaftaran</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($santri as $biodata)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       class="form-check-input biodata-checkbox"
                                                       name="biodata_ids[]"
                                                       value="{{ $biodata->id }}"
                                                       checked>
                                            </td>
                                            <td>{{ str_pad($biodata->id, 8, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $biodata->nama_lengkap }}</td>
                                            <td>{{ $biodata->nik_calon_santri }}</td>
                                            <td>{{ $biodata->tempat_lahir }}</td>
                                            <td>{{ optional($biodata->tanggal_lahir)->format('d-m-Y') ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Tidak ada data santri unverified.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-danger" disabled>Tolak Data Diri</button>
                                <button type="submit" class="btn btn-success">Verifikasi Data Diri</button>
                            </div>
                            <div>
                                {{ $santri->links() }}
                            </div>
                        </div>
                    </form>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectAll = document.getElementById('selectAllModal');
            const checkboxes = document.querySelectorAll('.biodata-checkbox');

            selectAll?.addEventListener('change', (event) => {
                checkboxes.forEach(cb => cb.checked = event.target.checked);
            });

            checkboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    if (!cb.checked) {
                        selectAll.checked = false;
                    } else if (Array.from(checkboxes).every(input => input.checked)) {
                        selectAll.checked = true;
                    }
                });
            });
        });
    </script>
@endpush
