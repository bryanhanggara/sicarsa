<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BeritaPesantren extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'slug',
        'status',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul') && empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
