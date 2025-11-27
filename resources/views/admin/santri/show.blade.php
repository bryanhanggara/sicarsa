@extends('layouts.admin')

@section('title', 'Detail Biodata Santri')

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Carbon;

    $formatDate = function ($date) {
        if (!$date) {
            return '';
        }

        return $date instanceof Carbon
            ? $date->format('Y-m-d')
            : Carbon::parse($date)->format('Y-m-d');
    };
@endphp

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-success text-uppercase small fw-semibold mb-1">Pondok Pesantren Al-Falah Putak</p>
                <h1 class="h3 fw-bold text-dark mb-1">Detail Biodata Santri</h1>
                <p class="text-muted mb-0">Tinjau data lengkap calon santri sebelum proses verifikasi.</p>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Nama Lengkap</p>
                        <h5 class="fw-bold text-dark mb-0">{{ $biodata->nama_lengkap ?? '-' }}</h5>
                        <p class="text-muted small mb-0">NIK: {{ $biodata->nik_calon_santri ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Jenjang Dituju</p>
                        <h5 class="fw-bold text-dark mb-0">{{ strtoupper($biodata->tujuan_jenjang_pendidikan ?? '-') }}</h5>
                        <p class="text-muted small mb-0">Status:
                            <span class="badge {{ $biodata->status === 'verified' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($biodata->status ?? 'unverified') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">ID Pendaftaran</p>
                        <h5 class="fw-bold text-dark mb-0">
                            {{ str_pad($biodata->id, 8, '0', STR_PAD_LEFT) }}
                        </h5>
                        <p class="text-muted small mb-0">Tanggal Daftar: {{ optional($biodata->created_at)->format('d M Y') ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biodata Section -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-user-circle me-2 text-success"></i>
                        Biodata Calon Santri
                    </h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label fw-medium text-dark mb-2">Foto</label>
                        <div class="border border-dashed rounded p-3 text-center bg-light-subtle">
                            @if($biodata->foto)
                                <img src="{{ Storage::url($biodata->foto) }}" alt="Foto Santri" class="img-fluid rounded" style="max-height: 260px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 260px;">
                                    <i class="fas fa-user text-muted" style="font-size: 3rem;"></i>
                                </div>
                                <p class="text-muted small mt-2 mb-0">Belum ada foto</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $biodata->nama_lengkap ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Tujuan Jenjang Pendidikan</label>
                                <input type="text" class="form-control" value="{{ $biodata->tujuan_jenjang_pendidikan ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">NISN</label>
                                <input type="text" class="form-control" value="{{ $biodata->nisn ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">NIK Calon Santri</label>
                                <input type="text" class="form-control" value="{{ $biodata->nik_calon_santri ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{ $biodata->tempat_lahir ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $formatDate($biodata->tanggal_lahir ?? null) }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Anak Ke</label>
                                <input type="text" class="form-control" value="{{ $biodata->anak_ke ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Jumlah Bersaudara</label>
                                <input type="text" class="form-control" value="{{ $biodata->jumlah_bersaudara ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="{{ $biodata->jenis_kelamin ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Agama</label>
                                <input type="text" class="form-control" value="{{ $biodata->agama ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Asal Sekolah</label>
                                <input type="text" class="form-control" value="{{ $biodata->asal_sekolah ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Nomor & Tahun Ijazah</label>
                                <input type="text" class="form-control" value="{{ $biodata->nomor_dan_tahun_ijazah ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $biodata->no_telepon ?? '-' }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biodata Ayah -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">Biodata Ayah</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $biodata->nama_lengkap_ayah ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ $biodata->pekerjaan_ayah ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $biodata->nomor_telepon_ayah ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $biodata->tempat_lahir_ayah ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="{{ $formatDate($biodata->tanggal_lahir_ayah ?? null) }}" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium text-dark">Alamat Lengkap</label>
                        <textarea class="form-control" rows="3" disabled>{{ $biodata->alamat_lengkap_ayah ?? '-' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biodata Ibu -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">Biodata Ibu</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $biodata->nama_lengkap_ibu ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ $biodata->pekerjaan_ibu ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $biodata->nomor_telepon_ibu ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $biodata->tempat_lahir_ibu ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="{{ $formatDate($biodata->tanggal_lahir_ibu ?? null) }}" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium text-dark">Alamat Lengkap</label>
                        <textarea class="form-control" rows="3" disabled>{{ $biodata->alamat_lengkap_ibu ?? '-' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Provinsi</label>
                        <input type="text" class="form-control" value="{{ $biodata->provinsi ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Kabupaten/Kota</label>
                        <input type="text" class="form-control" value="{{ $biodata->kabupaten_kota ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">Kecamatan</label>
                        <input type="text" class="form-control" value="{{ $biodata->kecamatan ?? '-' }}" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium text-dark">Detail Alamat</label>
                        <textarea class="form-control" rows="3" disabled>{{ $biodata->detail_alamat ?? '-' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumen Pendukung -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase small">No</th>
                                <th class="text-uppercase small">Jenis Berkas</th>
                                <th class="text-uppercase small">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kartu Keluarga</td>
                                <td>
                                    @if($biodata->kartu_keluarga)
                                        <a href="{{ Storage::url($biodata->kartu_keluarga) }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat Berkas</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Akte Kelahiran</td>
                                <td>
                                    @if($biodata->akte_kelahiran)
                                        <a href="{{ Storage::url($biodata->akte_kelahiran) }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat Berkas</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Surat Pernyataan Santri</td>
                                <td>
                                    @if($biodata->surat_pernyataan_santri)
                                        <a href="{{ Storage::url($biodata->surat_pernyataan_santri) }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat Berkas</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kartu Indonesia Pintar (Opsional)</td>
                                <td>
                                    @if($biodata->kartu_indonesia_pintar)
                                        <a href="{{ Storage::url($biodata->kartu_indonesia_pintar) }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat Berkas</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
