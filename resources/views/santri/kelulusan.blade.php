@extends('layouts.santri')

@section('title', 'Informasi Kelulusan')

@section('content')
<div class="container mt-4">

    {{-- Jika belum ada pendaftaran atau belum diterima --}}
    @if ($status != 'diterima')
        <div class="alert alert-warning text-center py-4 shadow-sm">
            <h5><strong>Belum ada informasi tentang status pendaftaran</strong></h5>
            <p class="mb-0">
                Mohon tunggu dan lakukan cek berulang.
                <br>
                Kelulusan dicek pada tabel pendaftaran yang statusnya <strong>DITERIMA</strong>.
            </p>
        </div>

    @else

        {{-- Jika diterima --}}
        <div class="alert alert-success text-center py-4">
            <h5><strong>** SELAMAT ANDA DITERIMA **</strong></h5>
            <p class="mb-0">
                Pondok Pesantren Salafiyah dan Tahfidzul Qur'an Al-Falah Putak
            </p>
        </div>

        <h5 class="text-center mb-4">DATA DIRI SANTRI</h5>

        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/' . $biodata->foto) }}"
                     class="img-fluid rounded shadow-sm"
                     style="width: 180px; height: auto;">
            </div>

            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td>NIK Calon Santri</td>
                        <td>:</td>
                        <td>{{ $biodata->nik_calon_santri }}</td>
                    </tr>

                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $biodata->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $biodata->tempat_lahir }}, {{ $biodata->tanggal_lahir->format('d-m-Y') }}</td>
                    </tr>

                    <tr>
                        <td>Jenjang Pendidikan</td>
                        <td>:</td>
                        <td>{{ $biodata->tujuan_jenjang_pendidikan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    @endif

</div>

@endsection