@extends('layouts.santri')

@section('title', 'Pembayaran Santri Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h2 fw-bold text-dark mb-4" style="color: #127499 !important;">
        Pembayaran Santri Baru Pesantren Al-Falah Putak
    </h1>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead ">
                        <tr class="text-white text-center">
                            <th style="background-color: #0c8c84 !important;" class="text-uppercase small fw-semibold text-white">Jenis Biaya</th>
                            <th style="background-color: #0c8c84 !important;" class="text-uppercase small fw-semibold text-white">Khusus Mondok</th>
                            <th style="background-color: #0c8c84 !important;" class="text-uppercase small fw-semibold text-white">MI & Mondok</th>
                            <th style="background-color: #0c8c84 !important;" class="text-uppercase small fw-semibold text-white">MTS & Mondok</th>
                            <th style="background-color: #0c8c84 !important;" class="text-uppercase small fw-semibold text-white">MA & Mondok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $formatRupiah = fn ($value) => $value === null ? ' - ' : 'Rp. ' . number_format($value, 0, ',', '.');
                        @endphp

                        @foreach ($biaya as $item)
                            <tr>
                                <td class="fw-medium text-dark">{{ $item['jenis'] }}</td>
                                <td class="text-center">{{ $formatRupiah($item['khusus_mondok']) }}</td>
                                <td class="text-center">{{ $formatRupiah($item['mi_mondok']) }}</td>
                                <td class="text-center">{{ $formatRupiah($item['mts_mondok']) }}</td>
                                <td class="text-center">{{ $formatRupiah($item['ma_mondok']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr " class="text-white fw-semibold">
                            <td style="background-color: #0c8c84 !important;" class="text-center text-white">TOTAL BIAYA</td>
                            <td style="background-color: #0c8c84 !important;" class="text-center text-white">{{ $formatRupiah($totalBiaya['khusus_mondok']) }}</td>
                            <td style="background-color: #0c8c84 !important;" class="text-center text-white">{{ $formatRupiah($totalBiaya['mi_mondok']) }}</td>
                            <td style="background-color: #0c8c84 !important;" class="text-center text-white">{{ $formatRupiah($totalBiaya['mts_mondok']) }}</td>
                            <td style="background-color: #0c8c84 !important;" class="text-center text-white">{{ $formatRupiah($totalBiaya['ma_mondok']) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-4">
                <h6 class="fw-semibold text-dark">Catatan:</h6>
                <ul class="mb-0 text-secondary">
                    @foreach ($catatan as $note)
                        <li>{{ $note }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @if($statusMessage)
        <div class="card border-0 shadow-sm" style="background-color: #e7f5f4;">
            <div class="card-body py-4 px-4 d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <i class="fas fa-info-circle text-success" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                    <p class="mb-0 fw-semibold text-dark" style="color: #128f88 !important;">{{ $statusMessage }}</p>
                    <small class="text-secondary">*Apabila data Anda sudah dikonfirmasi, silakan ikuti arahan admin untuk proses pembayaran berikutnya.</small>
                </div>
            </div>
        </div>
    @endif

    @if($isVerified)
        <!-- Informasi Rekening Bank -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-semibold text-dark mb-3">Informasi Rekening Bank</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 fw-medium text-dark">BRI</p>
                        <p class="mb-0 text-secondary">09021937786213 a.n Libra Fransiska</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 fw-medium text-dark">BNI</p>
                        <p class="mb-0 text-secondary">09021937786213 a.n Libra Fransiska</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Upload Bukti Pembayaran -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-semibold text-dark mb-3">Upload Bukti Pembayaran Disini:</h5>
                <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" 
                               accept=".pdf,.jpg,.jpeg,.png" 
                               class="form-control" 
                               onchange="previewBuktiPembayaran(this)" required>
                        @error('bukti_pembayaran') 
                            <span class="text-danger small">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div id="bukti-preview" class="mb-3">
                        @if($biodata && $biodata->bukti_pembayaran)
                            <img src="{{ Storage::url($biodata->bukti_pembayaran) }}" 
                                 alt="Bukti Pembayaran" 
                                 class="img-fluid rounded" 
                                 style="max-height: 400px; width: auto;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image" style="font-size: 3rem; color: #9ca3af;"></i>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-success btn-lg px-5">
                            <i class="fas fa-paper-plane me-2"></i>Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@push('scripts')
<script>
    function previewBuktiPembayaran(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bukti-preview').innerHTML = 
                    '<img src="' + e.target.result + '" alt="Bukti Pembayaran" class="img-fluid rounded" style="max-height: 400px; width: auto;">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush

@push('styles')
<style>
    table.table,
    table.table th,
    table.table td {
        border: 1px solid #B6DFDD !important;
    }
</style>
@endpush
@endsection

