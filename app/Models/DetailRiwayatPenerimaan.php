<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailRiwayatPenerimaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'riwayat_penerimaan_id',
        'biodata_santri_id',
    ];

    public function riwayatPenerimaan(): BelongsTo
    {
        return $this->belongsTo(RiwayatPenerimaan::class, 'riwayat_penerimaan_id');
    }

    public function biodataSantri(): BelongsTo
    {
        return $this->belongsTo(BiodataSantri::class, 'biodata_santri_id');
    }
}
