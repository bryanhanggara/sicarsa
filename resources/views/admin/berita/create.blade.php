@extends('layouts.admin')

@section('title', 'Tambah Berita - Admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Tambah Berita Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
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
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">
                            Judul Berita <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" 
                               name="judul" 
                               value="{{ old('judul') }}" 
                               placeholder="Masukkan judul berita" 
                               required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label fw-semibold">
                            Isi Berita <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" 
                                  id="isi" 
                                  name="isi" 
                                  rows="10" 
                                  placeholder="Masukkan isi berita" 
                                  required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">
                            Gambar
                        </label>
                        <input type="file" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" 
                               name="gambar" 
                               accept="image/jpeg,image/jpg,image/png">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                        <div id="preview" class="mt-2"></div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">
                            Status <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
