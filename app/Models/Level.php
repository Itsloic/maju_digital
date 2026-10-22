<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    protected $table = 'levels';

    protected $primaryKey = 'id_level';

    protected $fillable = [
        'nama_level',
        'keterangan',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'level_id', 'id_level');
    }
}
