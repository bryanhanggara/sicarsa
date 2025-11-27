<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periode extends Model
{
    protected $fillable = [
        'tahun_periode_penerimaan',
        'kuota_penerimaan',
    ];

    public function riwayatPenerimaans(): HasMany
    {
        return $this->hasMany(RiwayatPenerimaan::class);
    }
}
