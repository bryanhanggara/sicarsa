<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RiwayatPenerimaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_penerimaan';

    protected $fillable = [
        'admin_id',
        'periode_id',
        'total_diterima',
        'total_ditolak',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class);
    }

    public function biodataSantris(): HasMany
    {
        return $this->hasMany(BiodataSantri::class, 'riwayat_penerimaan_id', 'id_penerimaan');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'id_penerimaan';
    }
}
