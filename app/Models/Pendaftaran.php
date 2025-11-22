<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    protected $fillable = [
        'biodata_santri_id',
        'bukti_pembayaran',
        'status',
    ];

    public function biodataSantri(): BelongsTo
    {
        return $this->belongsTo(BiodataSantri::class);
    }
}
