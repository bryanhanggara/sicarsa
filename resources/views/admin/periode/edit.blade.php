@extends('layouts.admin')

@section('title', 'Edit Periode - Admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Edit Periode Penerimaan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.periode.index') }}">Periode</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.periode.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Alert Messages -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.periode.update', $periode) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tahun_periode_penerimaan" class="form-label fw-semibold">
                                    Tahun Periode Penerimaan <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('tahun_periode_penerimaan') is-invalid @enderror" 
                                       id="tahun_periode_penerimaan" 
                                       name="tahun_periode_penerimaan" 
                                       value="{{ old('tahun_periode_penerimaan', $periode->tahun_periode_penerimaan) }}" 
                                       placeholder="Contoh: 2024/2025" 
                                       required>
                                @error('tahun_periode_penerimaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Format: Tahun Ajaran (contoh: 2024/2025)</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kuota_penerimaan" class="form-label fw-semibold">
                                    Kuota Penerimaan <span class="text-danger">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control @error('kuota_penerimaan') is-invalid @enderror" 
                                       id="kuota_penerimaan" 
                                       name="kuota_penerimaan" 
                                       value="{{ old('kuota_penerimaan', $periode->kuota_penerimaan) }}" 
                                       placeholder="Masukkan jumlah kuota" 
                                       min="1" 
                                       required>
                                @error('kuota_penerimaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Jumlah maksimal siswa yang dapat diterima</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.periode.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

