<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiodataSantri extends Model
{
    protected $fillable = [
        'user_id',
        'foto',
        'nama_lengkap',
        'tujuan_jenjang_pendidikan',
        'nisn',
        'nik_calon_santri',
        'tempat_lahir',
        'tanggal_lahir',
        'anak_ke',
        'jumlah_bersaudara',
        'jenis_kelamin',
        'agama',
        'asal_sekolah',
        'nomor_dan_tahun_ijazah',
        'no_telepon',
        'nama_lengkap_ayah',
        'pekerjaan_ayah',
        'nomor_telepon_ayah',
        'alamat_lengkap_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'nama_lengkap_ibu',
        'pekerjaan_ibu',
        'nomor_telepon_ibu',
        'alamat_lengkap_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'provinsi',
        'kecamatan',
        'kabupaten_kota',
        'detail_alamat',
        'kartu_keluarga',
        'akte_kelahiran',
        'surat_pernyataan_santri',
        'kartu_indonesia_pintar',
        'status',
        'bukti_pembayaran',
        'status_penerimaan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'tanggal_lahir_ayah' => 'date',
            'tanggal_lahir_ibu' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
