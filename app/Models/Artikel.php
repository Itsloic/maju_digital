<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'kategori',
        'penulis',
        'gambar',
        'tanggal_publikasi',
        'kategori_id',
        'penulis_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_publikasi' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function kategoriRelasi(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    public function penulisAkun(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penulis_id', 'id');
    }
}
