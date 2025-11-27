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
        <div class="role-tab {{ old('role', 'santri') === 'santri' ? 'active' : '' }}" data-role="santri" onclick="switchRole('santri')">
            Calon Santri
        </div>
        <div class="role-tab {{ old('role') === 'admin' ? 'active' : '' }}" data-role="admin" onclick="switchRole('admin')">
            Admin Pesantren
        </div>
    </div>
    
    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
        <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'santri') }}">
        
        <div class="mb-3 santri-field">
            <label for="nik" class="form-label">Nomor Induk Keluarga</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                   id="nik" name="nik" placeholder="NIK Pendaftar" 
                   value="{{ old('nik') }}">
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="jenjang" class="form-label mt-3">Jenjang Yang Dituju</label>
            <select id="jenjang" name="jenjang_yang_dituju" 
                    class="form-select @error('jenjang_yang_dituju') is-invalid @enderror">
                <option value="">-- Pilih Jenjang --</option>
                <option value="MI" {{ old('jenjang_yang_dituju') == 'MI' ? 'selected' : '' }}>MI</option>
                <option value="MTs" {{ old('jenjang_yang_dituju') == 'MTs' ? 'selected' : '' }}>MTs</option>
                <option value="MA" {{ old('jenjang_yang_dituju') == 'MA' ? 'selected' : '' }}>MA</option>
            </select>
            @error('jenjang_yang_dituju')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 admin-field d-none">
            <label for="email" class="form-label">Email Admin</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" placeholder="Email Admin"
                   value="{{ old('email') }}">
            @error('email')
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
        document.querySelectorAll('.role-tab').forEach(tab => tab.classList.remove('active'));
        document.querySelector(`[data-role="${role}"]`).classList.add('active');

        document.getElementById('roleInput').value = role;

        const santriField = document.querySelector('.santri-field');
        const adminField = document.querySelector('.admin-field');

        if (role === 'admin') {
            santriField.classList.add('d-none');
            adminField.classList.remove('d-none');
            document.getElementById('email').setAttribute('required', 'required');
            document.getElementById('nik').removeAttribute('required');
            document.getElementById('jenjang').removeAttribute('required');
        } else {
            adminField.classList.add('d-none');
            santriField.classList.remove('d-none');
            document.getElementById('nik').setAttribute('required', 'required');
            document.getElementById('email').removeAttribute('required');
            document.getElementById('jenjang').setAttribute('required', 'required');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const initialRole = document.getElementById('roleInput').value || 'santri';
        switchRole(initialRole);
    });
</script>
@endsection
