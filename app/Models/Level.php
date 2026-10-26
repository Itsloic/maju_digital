<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    public const ADMINISTRATOR = 1;

    public const EDITOR = 2;

    public const PENULIS = 3;

    public const MASYARAKAT = 4;

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
