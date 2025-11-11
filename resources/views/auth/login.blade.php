@extends('auth.layout')

@section('title', 'Login - Pondok Pesantren Al-Falah Putak')

@section('content')
    <h1 class="page-title">Pondok Pesantren Al-Falah Putak</h1>
    <p class="page-subtitle">Login berdasarkan peran pengguna yang telah Anda miliki</p>
    
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
    
    <!-- Role Selection Tabs -->
    <div class="role-tabs">
        <div class="role-tab active" data-role="santri" onclick="switchRole('santri')">
            Calon Santri
        </div>
        <div class="role-tab" data-role="admin" onclick="switchRole('admin')">
            Admin Pesantren
        </div>
    </div>
    
    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
        <input type="hidden" name="role" id="roleInput" value="santri">
        
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
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                   id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" 
                   value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap')
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
        
        <div class="mb-4">
            <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan Yang Dituju</label>
            <div class="input-group">
                <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" 
                        id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                    <option value="">Pilih Jenjang Pendidikan</option>
                    <option value="SD" {{ old('jenjang_pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ old('jenjang_pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ old('jenjang_pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="SMK" {{ old('jenjang_pendidikan') == 'SMK' ? 'selected' : '' }}>SMK</option>
                </select>
                <span class="input-group-text">
                    <i class="bi bi-chevron-down"></i>
                </span>
                @error('jenjang_pendidikan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
        
        <div class="link-text">
            Belum pernah mendaftar? <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    function switchRole(role) {
        // Update active tab
        document.querySelectorAll('.role-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelector(`[data-role="${role}"]`).classList.add('active');
        
        // Update hidden input
        document.getElementById('roleInput').value = role;
    }
</script>
@endsection

