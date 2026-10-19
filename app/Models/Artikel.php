<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
