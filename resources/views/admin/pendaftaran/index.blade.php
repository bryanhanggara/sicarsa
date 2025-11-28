@extends('layouts.admin')

@section('title', 'Data Pendaftaran - Admin')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Data Pendaftaran Calon Santri Pesantren Al-Falah Putak</h1>
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

        <!-- Toolbar -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-auto">
                        <h6 class="mb-0 fw-semibold text-dark">Data Pendaftaran Calon Santri {{ $jenjangLabel }}</h6>
                    </div>
                    <div class="col-12 col-lg ms-lg-auto">
                        <form method="GET" action="{{ route('admin.pendaftaran.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
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
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#penerimaanModal">
                                <i class="fas fa-plus me-2"></i>Unggah Data Penerimaan
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
                                <th class="px-4 py-3 fw-semibold text-dark border-0 text-center">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftarans as $biodata)
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
                                    <td class="px-4 py-3 border-0 text-center">
                                        @if($biodata->bukti_pembayaran)
                                            <a href="{{ Storage::url($biodata->bukti_pembayaran) }}" target="_blank" class="btn btn-link text-decoration-none p-0" title="Lihat Pembayaran">
                                                <i class="fas fa-eye text-success" style="font-size: 1.1rem;"></i>
                                            </a>
                                        @else
                                            <span class="text-muted small">Belum ada</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-5 text-center text-muted">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                        <p class="mb-0">Tidak ada data pendaftaran untuk jenjang ini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($pendaftarans->hasPages())
                    <div class="card-footer border-0 bg-white px-4 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $pendaftarans->firstItem() ?? 0 }} sampai {{ $pendaftarans->lastItem() ?? 0 }} dari {{ $pendaftarans->total() }} data
                            </div>
                            <nav>
                                {{ $pendaftarans->links() }}
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

<!-- Modal Penerimaan -->
<div class="modal fade" id="penerimaanModal" tabindex="-1" aria-labelledby="penerimaanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0 position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; opacity: 0.5;"></button>
                <div class="w-100">
                    <h5 class="modal-title fw-bold text-dark mb-3" id="penerimaanModalLabel">Pilih Admin dan Periode Penerimaan</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="adminSelect" class="form-label small text-muted mb-1">Nama Admin</label>
                            <select name="admin_id" id="adminSelect" class="form-select" style="border-color: #129990;">
                                <option value="">Pilih Nama Admin</option>
                                @foreach($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="periodeSelect" class="form-label small text-muted mb-1">Periode Penerimaan</label>
                            <select name="periode_id" id="periodeSelect" class="form-select" style="border-color: #129990;">
                                <option value="">Pilih Periode</option>
                                @foreach($periodes as $periode)
                                    <option value="{{ $periode->id }}" data-kuota="{{ $periode->kuota_penerimaan }}">
                                        {{ $periode->tahun_periode_penerimaan }} (Kuota: {{ $periode->kuota_penerimaan }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="kuotaInfo" class="mt-2 small text-muted" style="display: none;"></div>
                </div>
            </div>
            <div class="modal-body">
                <form id="penerimaanForm" method="POST" action="{{ route('admin.pendaftaran.process') }}">
                    @csrf
                    <input type="hidden" name="admin_id" id="formAdminId">
                    <input type="hidden" name="periode_id" id="formPeriodeId">
                    <input type="hidden" name="action" id="formAction">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h4 class="mb-0 text-success">Daftar Calon Santri</h4>
                        <div class="d-flex align-items-center gap-2">
                            <div class="input-group" style="max-width: 280px;">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" placeholder="Search Here" id="modalSearch">
                            </div>
                            <button type="button" class="btn btn-outline-secondary" style="min-width: 120px;">
                                Filter <i class="fas fa-chevron-down ms-1"></i>
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive" style="max-height: 400px;">
                        <table class="table table-hover mb-0">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0" style="width: 50px;">
                                        <input type="checkbox" id="selectAll" class="form-check-input">
                                    </th>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0">ID_Pendaftaran</th>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0">Nama Lengkap</th>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0">NIK</th>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0">Tempat Lahir</th>
                                    <th class="px-4 py-3 fw-semibold text-dark border-0">Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendaftarans as $biodata)
                                    @php
                                        $idPendaftaran = str_pad($biodata->id, 8, '0', STR_PAD_LEFT);
                                    @endphp
                                    <tr>
                                        <td class="px-4 py-3 border-0">
                                            <input type="checkbox" name="pendaftaran_ids[]" value="{{ $biodata->id }}" class="form-check-input pendaftaran-checkbox">
                                        </td>
                                        <td class="px-4 py-3 border-0">{{ $idPendaftaran }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->nama_lengkap }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->nik_calon_santri }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->tempat_lahir }}</td>
                                        <td class="px-4 py-3 border-0">{{ $biodata->tanggal_lahir ? $biodata->tanggal_lahir->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-5 text-center text-muted">
                                            <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                            <p class="mb-0">Tidak ada data pendaftaran untuk jenjang ini.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($pendaftarans->hasPages())
                        <div class="d-flex justify-content-end mt-3">
                            <nav>
                                {{ $pendaftarans->appends(request()->query())->links() }}
                            </nav>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer border-0 pt-3">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <button type="button" class="btn btn-outline-secondary" id="btnTolak" disabled>
                        Tolak Pendaftaran
                    </button>
                    <button type="button" class="btn btn-success" id="btnKonfirmasi" disabled>
                        Konfirmasi Kelulusan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('penerimaanModal');
        const adminSelect = document.getElementById('adminSelect');
        const periodeSelect = document.getElementById('periodeSelect');
        const formAdminId = document.getElementById('formAdminId');
        const formPeriodeId = document.getElementById('formPeriodeId');
        const kuotaInfo = document.getElementById('kuotaInfo');
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.pendaftaran-checkbox');
        const btnTolak = document.getElementById('btnTolak');
        const btnKonfirmasi = document.getElementById('btnKonfirmasi');
        const form = document.getElementById('penerimaanForm');
        const formAction = document.getElementById('formAction');

        // Update form admin_id when dropdown changes
        adminSelect.addEventListener('change', function() {
            formAdminId.value = this.value;
            updateButtonStates();
        });

        // Update form periode_id and show kuota info when dropdown changes
        periodeSelect.addEventListener('change', function() {
            formPeriodeId.value = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const kuota = selectedOption.getAttribute('data-kuota');
            
            if (this.value && kuota) {
                kuotaInfo.style.display = 'block';
                kuotaInfo.innerHTML = `<i class="fas fa-info-circle"></i> Kuota tersedia: <strong>${kuota}</strong> siswa`;
            } else {
                kuotaInfo.style.display = 'none';
            }
            
            updateButtonStates();
            updateKuotaWarning();
        });

        // Select all functionality
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
            updateButtonStates();
        });

        // Individual checkbox change
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                updateSelectAllState();
                updateButtonStates();
                updateKuotaWarning();
            });
        });

        function updateSelectAllState() {
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            const someChecked = Array.from(checkboxes).some(cb => cb.checked);
            selectAll.checked = allChecked;
            selectAll.indeterminate = someChecked && !allChecked;
        }

        function updateButtonStates() {
            const hasSelection = Array.from(checkboxes).some(cb => cb.checked);
            const hasAdmin = adminSelect.value !== '';
            const hasPeriode = periodeSelect.value !== '';
            const enabled = hasSelection && hasAdmin && hasPeriode;
            
            btnTolak.disabled = !enabled;
            btnKonfirmasi.disabled = !enabled;
        }

        function updateKuotaWarning() {
            const selectedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
            const selectedOption = periodeSelect.options[periodeSelect.selectedIndex];
            const kuota = selectedOption ? parseInt(selectedOption.getAttribute('data-kuota')) : 0;
            
            if (periodeSelect.value && selectedCount > 0) {
                if (selectedCount > kuota) {
                    kuotaInfo.innerHTML = `<i class="fas fa-exclamation-triangle text-danger"></i> <span class="text-danger">Jumlah yang dipilih (${selectedCount}) melebihi kuota (${kuota})!</span>`;
                    kuotaInfo.style.display = 'block';
                    btnKonfirmasi.disabled = true;
                } else {
                    const tersisa = kuota - selectedCount;
                    kuotaInfo.innerHTML = `<i class="fas fa-info-circle"></i> Kuota tersedia: <strong>${kuota}</strong> | Dipilih: <strong>${selectedCount}</strong> | Tersisa: <strong>${tersisa}</strong>`;
                    kuotaInfo.style.display = 'block';
                    if (adminSelect.value) {
                        btnKonfirmasi.disabled = false;
                    }
                }
            }
        }

        // Tolak button
        btnTolak.addEventListener('click', function() {
            const selected = Array.from(checkboxes).filter(cb => cb.checked);
            if (selected.length === 0) {
                alert('Pilih minimal satu pendaftaran untuk ditolak.');
                return;
            }
            if (confirm(`Apakah Anda yakin ingin menolak ${selected.length} pendaftaran yang dipilih?`)) {
                formAction.value = 'ditolak';
                form.submit();
            }
        });

        // Konfirmasi button
        btnKonfirmasi.addEventListener('click', function() {
            const selected = Array.from(checkboxes).filter(cb => cb.checked);
            if (selected.length === 0) {
                alert('Pilih minimal satu pendaftaran untuk diterima.');
                return;
            }
            
            if (!periodeSelect.value) {
                alert('Pilih periode penerimaan terlebih dahulu.');
                return;
            }
            
            const selectedOption = periodeSelect.options[periodeSelect.selectedIndex];
            const kuota = parseInt(selectedOption.getAttribute('data-kuota'));
            
            if (selected.length > kuota) {
                alert(`Jumlah yang dipilih (${selected.length}) melebihi kuota yang tersedia (${kuota}). Silakan kurangi jumlah pilihan.`);
                return;
            }
            
            if (confirm(`Apakah Anda yakin ingin menerima ${selected.length} pendaftaran yang dipilih untuk periode ${selectedOption.text}?`)) {
                formAction.value = 'diterima';
                form.submit();
            }
        });

        // Reset form when modal is closed
        modal.addEventListener('hidden.bs.modal', function() {
            form.reset();
            adminSelect.value = '';
            periodeSelect.value = '';
            formAdminId.value = '';
            formPeriodeId.value = '';
            kuotaInfo.style.display = 'none';
            checkboxes.forEach(cb => cb.checked = false);
            selectAll.checked = false;
            selectAll.indeterminate = false;
            updateButtonStates();
        });
    });
</script>
@endpush

