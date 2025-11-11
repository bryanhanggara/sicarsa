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
                   value="{{ old('nik') }}" required autofocus>
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Ingat Saya
                </label>
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
