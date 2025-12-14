@extends('layouts.admin')

@section('title', 'Detail Berita - Admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2" style="color: #0d7377;">Detail Berita Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-warning text-white">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-3" style="color: #0d7377;">{{ $berita->judul }}</h3>
                        
                        <div class="mb-3">
                            <span class="badge {{ $berita->status === 'published' ? 'bg-success' : 'bg-secondary' }} me-2">
                                {{ $berita->status === 'published' ? 'Published' : 'Draft' }}
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-user me-1"></i>{{ $berita->user->name }}
                            </span>
                            <span class="text-muted ms-3">
                                <i class="fas fa-calendar me-1"></i>{{ $berita->created_at->format('d M Y H:i') }}
                            </span>
                        </div>

                        @if($berita->gambar)
                            <div class="mb-4">
                                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                            </div>
                        @endif

                        <div class="content-text">
                            {!! nl2br(e($berita->isi)) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Informasi</h5>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Slug</small>
                                    <p class="mb-0">{{ $berita->slug }}</p>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Dibuat</small>
                                    <p class="mb-0">{{ $berita->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Diupdate</small>
                                    <p class="mb-0">{{ $berita->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .content-text {
            line-height: 1.8;
            font-size: 1rem;
            color: #333;
        }
    </style>
@endpush
