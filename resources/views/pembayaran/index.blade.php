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
</div>

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

