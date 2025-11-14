@extends('layouts.santri')

@section('title', 'Biodata Calon Santri')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="container-fluid">
    <h1 class="h2 fw-bold text-dark mb-4" style="color: #127499 !important;">Biodata Calon Santri Pesantren Al-Falah Putak</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('biodata-santri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Biodata Calon Santri -->
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-user-circle me-2 text-success"></i>
                        Biodata Calon Santri
                    </h2>
                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                </div>

                <div class="row">
                    <!-- Foto Section -->
                    <div class="col-md-4 mb-4 mb-md-0">
                        <label class="form-label fw-medium text-dark mb-2">
                            <i class="fas fa-camera me-2"></i>Foto
                        </label>
                        <div class="border border-1 border-dashed border-secondary rounded p-3 text-center">
                            <div id="foto-preview" class="mb-3">
                                @if($biodata && $biodata->foto)
                                    <img src="{{ Storage::url($biodata->foto) }}" alt="Foto" class="img-fluid rounded" style="max-height: 256px; width: 100%; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 256px;">
                                        <i class="fas fa-user" style="font-size: 4rem; color: #9ca3af;"></i>
                                    </div>
                                @endif
                            </div>
                            <input type="file" name="foto" id="foto" accept="image/*" class="d-none" onchange="previewFoto(this)">
                            <label for="foto" class="btn btn-sm btn-outline-success cursor-pointer">
                                <i class="fas fa-edit me-2"></i>Unggah Foto
                            </label>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_lengkap" class="form-label fw-medium text-dark">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" 
                                       value="{{ Auth::user()->name }}"
                                       class="form-control" 
                                       placeholder="Nama Lengkap" required>
                                @error('nama_lengkap') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tujuan_jenjang_pendidikan" class="form-label fw-medium text-dark">Tujuan Jenjang Pendidikan</label>
                                <input type="text" name="tujuan_jenjang_pendidikan" id="tujuan_jenjang_pendidikan"
                                       value="{{ Auth::user()->jenjang_yang_dituju }}"
                                       class="form-control" 
                                       placeholder="Tujuan Jenjang Pendidikan" required>
                                @error('tujuan_jenjang_pendidikan') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nisn" class="form-label fw-medium text-dark">NISN</label>
                                <input type="text" name="nisn" id="nisn"
                                       value="{{ old('nisn', $biodata->nisn ?? '') }}"
                                       class="form-control" 
                                       placeholder="NISN">
                                @error('nisn') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nik_calon_santri" class="form-label fw-medium text-dark">NIK Calon Santri</label>
                                <input type="text" name="nik_calon_santri" id="nik_calon_santri"
                                       value="{{ Auth::user()->nik }}"
                                       class="form-control" 
                                       placeholder="NIK Calon Santri">
                                @error('nik_calon_santri') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tempat_lahir" class="form-label fw-medium text-dark">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                       value="{{ Auth::user()->tempat_lahir }}"
                                       class="form-control" 
                                       placeholder="Tempat Lahir" required>
                                @error('tempat_lahir') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label fw-medium text-dark">Tanggal Lahir</label>
                                @php
                                    $tanggalLahirValue = old('tanggal_lahir');
                                    if (!$tanggalLahirValue && $biodata && $biodata->tanggal_lahir) {
                                        $tanggalLahirValue = $biodata->tanggal_lahir instanceof \Carbon\Carbon 
                                            ? $biodata->tanggal_lahir->format('Y-m-d') 
                                            : \Carbon\Carbon::parse($biodata->tanggal_lahir)->format('Y-m-d');
                                    } elseif (!$tanggalLahirValue && Auth::user()->tanggal_lahir) {
                                        $tanggalLahirValue = \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->format('Y-m-d');
                                    }
                                @endphp
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                       value="{{ $tanggalLahirValue ?? '' }}"
                                       class="form-control" 
                                       required>
                                @error('tanggal_lahir') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="anak_ke" class="form-label fw-medium text-dark">Anak Ke-</label>
                                <input type="number" name="anak_ke" id="anak_ke"
                                       value="{{ old('anak_ke', $biodata->anak_ke ?? '') }}"
                                       class="form-control" 
                                       placeholder="Anak Ke-">
                                @error('anak_ke') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_bersaudara" class="form-label fw-medium text-dark">Jumlah Bersaudara</label>
                                <input type="number" name="jumlah_bersaudara" id="jumlah_bersaudara"
                                       value="{{ old('jumlah_bersaudara', $biodata->jumlah_bersaudara ?? '') }}"
                                       class="form-control" 
                                       placeholder="Jumlah Bersaudara">
                                @error('jumlah_bersaudara') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label fw-medium text-dark">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" 
                                        class="form-select" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $biodata->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $biodata->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="agama" class="form-label fw-medium text-dark">Agama</label>
                                <input type="text" name="agama" id="agama"
                                       value="{{ old('agama', $biodata->agama ?? '') }}"
                                       class="form-control" 
                                       placeholder="Agama" required>
                                @error('agama') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="asal_sekolah" class="form-label fw-medium text-dark">Asal Sekolah (SD/MI/SMP/MTS)</label>
                                <input type="text" name="asal_sekolah" id="asal_sekolah"
                                       value="{{ old('asal_sekolah', $biodata->asal_sekolah ?? '') }}"
                                       class="form-control" 
                                       placeholder="Asal Sekolah">
                                @error('asal_sekolah') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nomor_dan_tahun_ijazah" class="form-label fw-medium text-dark">Nomor dan Tahun Ijazah</label>
                                <input type="text" name="nomor_dan_tahun_ijazah" id="nomor_dan_tahun_ijazah"
                                       value="{{ old('nomor_dan_tahun_ijazah', $biodata->nomor_dan_tahun_ijazah ?? '') }}"
                                       class="form-control" 
                                       placeholder="Nomor dan Tahun Ijazah">
                                @error('nomor_dan_tahun_ijazah') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label fw-medium text-dark">No. Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon"
                                       value="{{ old('no_telepon', $biodata->no_telepon ?? '') }}"
                                       class="form-control" 
                                       placeholder="Nomor Telepon">
                                @error('no_telepon') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biodata Diri Ayah -->
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-file-alt me-2 text-success"></i>
                        Biodata Diri Ayah
                    </h2>
                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_lengkap_ayah" class="form-label fw-medium text-dark">Nama Lengkap Ayah</label>
                        <input type="text" name="nama_lengkap_ayah" id="nama_lengkap_ayah"
                               value="{{ old('nama_lengkap_ayah', $biodata->nama_lengkap_ayah ?? '') }}"
                               class="form-control" 
                               placeholder="Nama Lengkap Ayah" required>
                        @error('nama_lengkap_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pekerjaan_ayah" class="form-label fw-medium text-dark">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                               value="{{ old('pekerjaan_ayah', $biodata->pekerjaan_ayah ?? '') }}"
                               class="form-control" 
                               placeholder="Pekerjaan Ayah">
                        @error('pekerjaan_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nomor_telepon_ayah" class="form-label fw-medium text-dark">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon_ayah" id="nomor_telepon_ayah"
                               value="{{ old('nomor_telepon_ayah', $biodata->nomor_telepon_ayah ?? '') }}"
                               class="form-control" 
                               placeholder="Nomor Telepon">
                        @error('nomor_telepon_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tempat_lahir_ayah" class="form-label fw-medium text-dark">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah"
                               value="{{ old('tempat_lahir_ayah', $biodata->tempat_lahir_ayah ?? '') }}"
                               class="form-control" 
                               placeholder="Tempat Lahir">
                        @error('tempat_lahir_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_lahir_ayah" class="form-label fw-medium text-dark">Tanggal Lahir</label>
                        @php
                            $tanggalLahirAyahValue = old('tanggal_lahir_ayah');
                            if (!$tanggalLahirAyahValue && $biodata && $biodata->tanggal_lahir_ayah) {
                                $tanggalLahirAyahValue = $biodata->tanggal_lahir_ayah instanceof \Carbon\Carbon 
                                    ? $biodata->tanggal_lahir_ayah->format('Y-m-d') 
                                    : \Carbon\Carbon::parse($biodata->tanggal_lahir_ayah)->format('Y-m-d');
                            }
                        @endphp
                        <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                               value="{{ $tanggalLahirAyahValue ?? '' }}"
                               class="form-control">
                        @error('tanggal_lahir_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="alamat_lengkap_ayah" class="form-label fw-medium text-dark">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap_ayah" id="alamat_lengkap_ayah" rows="3"
                                  class="form-control" 
                                  placeholder="Alamat Lengkap">{{ old('alamat_lengkap_ayah', $biodata->alamat_lengkap_ayah ?? '') }}</textarea>
                        @error('alamat_lengkap_ayah') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Biodata Diri Ibu -->
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-file-alt me-2 text-success"></i>
                        Biodata Diri Ibu
                    </h2>
                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_lengkap_ibu" class="form-label fw-medium text-dark">Nama Lengkap Ibu</label>
                        <input type="text" name="nama_lengkap_ibu" id="nama_lengkap_ibu"
                               value="{{ old('nama_lengkap_ibu', $biodata->nama_lengkap_ibu ?? '') }}"
                               class="form-control" 
                               placeholder="Nama Lengkap Ibu" required>
                        @error('nama_lengkap_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pekerjaan_ibu" class="form-label fw-medium text-dark">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                               value="{{ old('pekerjaan_ibu', $biodata->pekerjaan_ibu ?? '') }}"
                               class="form-control" 
                               placeholder="Pekerjaan Ibu">
                        @error('pekerjaan_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nomor_telepon_ibu" class="form-label fw-medium text-dark">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon_ibu" id="nomor_telepon_ibu"
                               value="{{ old('nomor_telepon_ibu', $biodata->nomor_telepon_ibu ?? '') }}"
                               class="form-control" 
                               placeholder="Nomor Telepon">
                        @error('nomor_telepon_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tempat_lahir_ibu" class="form-label fw-medium text-dark">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                               value="{{ old('tempat_lahir_ibu', $biodata->tempat_lahir_ibu ?? '') }}"
                               class="form-control" 
                               placeholder="Tempat Lahir">
                        @error('tempat_lahir_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_lahir_ibu" class="form-label fw-medium text-dark">Tanggal Lahir</label>
                        @php
                            $tanggalLahirIbuValue = old('tanggal_lahir_ibu');
                            if (!$tanggalLahirIbuValue && $biodata && $biodata->tanggal_lahir_ibu) {
                                $tanggalLahirIbuValue = $biodata->tanggal_lahir_ibu instanceof \Carbon\Carbon 
                                    ? $biodata->tanggal_lahir_ibu->format('Y-m-d') 
                                    : \Carbon\Carbon::parse($biodata->tanggal_lahir_ibu)->format('Y-m-d');
                            }
                        @endphp
                        <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                               value="{{ $tanggalLahirIbuValue ?? '' }}"
                               class="form-control">
                        @error('tanggal_lahir_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="alamat_lengkap_ibu" class="form-label fw-medium text-dark">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap_ibu" id="alamat_lengkap_ibu" rows="3"
                                  class="form-control" 
                                  placeholder="Alamat Lengkap">{{ old('alamat_lengkap_ibu', $biodata->alamat_lengkap_ibu ?? '') }}</textarea>
                        @error('alamat_lengkap_ibu') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat Lengkap Calon Santri -->
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-home me-2 text-success"></i>
                        Alamat Lengkap Calon Santri
                    </h2>
                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label fw-medium text-dark">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi"
                               value="{{ old('provinsi', $biodata->provinsi ?? '') }}"
                               class="form-control" 
                               placeholder="Provinsi">
                        @error('provinsi') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="kabupaten_kota" class="form-label fw-medium text-dark">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten_kota" id="kabupaten_kota"
                               value="{{ old('kabupaten_kota', $biodata->kabupaten_kota ?? '') }}"
                               class="form-control" 
                               placeholder="Kabupaten/Kota">
                        @error('kabupaten_kota') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label fw-medium text-dark">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan"
                               value="{{ old('kecamatan', $biodata->kecamatan ?? '') }}"
                               class="form-control" 
                               placeholder="Kecamatan">
                        @error('kecamatan') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="detail_alamat" class="form-label fw-medium text-dark">Detail Alamat</label>
                        <textarea name="detail_alamat" id="detail_alamat" rows="3"
                                  class="form-control" 
                                  placeholder="Detail Alamat">{{ old('detail_alamat', $biodata->detail_alamat ?? '') }}</textarea>
                        @error('detail_alamat') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Berkas Pendukung/Lampiran -->
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-semibold text-dark d-flex align-items-center mb-0">
                        <i class="fas fa-file-alt me-2 text-success"></i>
                        Berkas Pendukung/Lampiran
                    </h2>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase small fw-medium">No</th>
                                <th class="text-uppercase small fw-medium">Jenis Berkas</th>
                                <th class="text-uppercase small fw-medium">File</th>
                                <th class="text-uppercase small fw-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">1</td>
                                <td class="align-middle">
                                    Kartu Keluarga
                                    <span class="text-danger small ms-2">*Wajib Diisi</span>
                                </td>
                                <td class="align-middle">
                                    <input type="file" name="kartu_keluarga" id="kartu_keluarga" 
                                           accept=".pdf,.jpg,.jpeg,.png" 
                                           class="form-control form-control-sm">
                                    @if($biodata && $biodata->kartu_keluarga)
                                        <p class="text-success small mt-1 mb-0">File sudah diunggah</p>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">2</td>
                                <td class="align-middle">
                                    Akte Kelahiran
                                    <span class="text-danger small ms-2">*Wajib Diisi</span>
                                </td>
                                <td class="align-middle">
                                    <input type="file" name="akte_kelahiran" id="akte_kelahiran" 
                                           accept=".pdf,.jpg,.jpeg,.png" 
                                           class="form-control form-control-sm">
                                    @if($biodata && $biodata->akte_kelahiran)
                                        <p class="text-success small mt-1 mb-0">File sudah diunggah</p>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">3</td>
                                <td class="align-middle">
                                    Surat Pernyataan Santri (Link Dibawah)
                                    <span class="text-danger small ms-2">*Wajib Diisi</span>
                                </td>
                                <td class="align-middle">
                                    <input type="file" name="surat_pernyataan_santri" id="surat_pernyataan_santri" 
                                           accept=".pdf,.jpg,.jpeg,.png" 
                                           class="form-control form-control-sm">
                                    @if($biodata && $biodata->surat_pernyataan_santri)
                                        <p class="text-success small mt-1 mb-0">File sudah diunggah</p>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">4</td>
                                <td class="align-middle">
                                    Kartu Indonesia Pintar (KIP/KPS) (jika ada)
                                    <span class="text-danger small ms-2">*Tidak Wajib</span>
                                </td>
                                <td class="align-middle">
                                    <input type="file" name="kartu_indonesia_pintar" id="kartu_indonesia_pintar" 
                                           accept=".pdf,.jpg,.jpeg,.png" 
                                           class="form-control form-control-sm">
                                    @if($biodata && $biodata->kartu_indonesia_pintar)
                                        <p class="text-success small mt-1 mb-0">File sudah diunggah</p>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <i class="fas fa-edit text-secondary" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex align-items-center gap-3">
                    <a href="{{ url('pdf/SURAT PERNYATAAN SANTRI.pdf') }}" class="btn btn-success d-inline-flex align-items-center">
                        <i class="fas fa-file-pdf me-2"></i>
                        surat_pernyataan_santri.pdf
                    </a>
                    <a href="{{ url('pdf/SURAT PERNYATAAN SANTRI.pdf') }}" class="text-success text-decoration-underline">Unduh Surat Pernyataan Santri Disini</a>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-left mb-4">
            <button type="submit" class="btn btn-success btn-lg px-5">
                Kirim
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewFoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto-preview').innerHTML = 
                    '<img src="' + e.target.result + '" alt="Foto" class="img-fluid rounded" style="max-height: 256px; width: 100%; object-fit: cover;">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
    .cursor-pointer {
        cursor: pointer;
    }
    label.cursor-pointer {
        cursor: pointer;
    }
</style>
@endpush
@endsection
