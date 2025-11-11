@extends('auth.layout')

@section('title', 'Pendaftaran - Pondok Pesantren Al-Falah Putak')

@section('content')
    <h1 class="page-title">Pendaftaran Pesantren Al-Falah Putak</h1>
    <p class="page-subtitle">Silahkan Isi Data Diri Pendaftar</p>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" placeholder="Nama Lengkap" 
                   value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" placeholder="Email" 
                   value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Keluarga</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                   id="nik" name="nik" placeholder="NIK Pendaftar" 
                   value="{{ old('nik') }}" required>
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                   id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" 
                   value="{{ old('tempat_lahir') }}" required>
            @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-calendar"></i>
                </span>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                       id="tanggal_lahir" name="tanggal_lahir" 
                       value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="mb-3">
            <label for="jenjang_yang_dituju" class="form-label">Jenjang Pendidikan Yang Dituju</label>
            <div class="input-group">
                <select class="form-select @error('jenjang_yang_dituju') is-invalid @enderror" 
                        id="jenjang_yang_dituju" name="jenjang_yang_dituju" required>
                    <option value="">Pilih Jenjang Pendidikan</option>
                    <option value="MI" {{ old('jenjang_yang_dituju') == 'MI' ? 'selected' : '' }}>MI</option>
                    <option value="MTs" {{ old('jenjang_yang_dituju') == 'MTs' ? 'selected' : '' }}>MTs</option>
                    <option value="MA" {{ old('jenjang_yang_dituju') == 'MA' ? 'selected' : '' }}>MA</option>
                </select>
                <span class="input-group-text">
                    <i class="bi bi-chevron-down"></i>
                </span>
                @error('jenjang_yang_dituju')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" 
                   id="password_confirmation" name="password_confirmation" 
                   placeholder="Konfirmasi Password" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
        
        <div class="link-text">
            Sudah Daftar? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
@endsection
