<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'level_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdministrator(): bool
    {
        return (int) $this->level_id === Level::ADMINISTRATOR;
    }

    public function isEditor(): bool
    {
        return (int) $this->level_id === Level::EDITOR;
    }

    public function isPenulis(): bool
    {
        return (int) $this->level_id === Level::PENULIS;
    }

    public function isMasyarakat(): bool
    {
        return (int) $this->level_id === Level::MASYARAKAT;
    }

    public function syncRoleFromLevel(): void
    {
        $roleMap = [
            Level::ADMINISTRATOR => 'administrator',
            Level::EDITOR => 'editor',
            Level::PENULIS => 'penulis',
            Level::MASYARAKAT => 'masyarakat',
        ];
        $this->role = $roleMap[$this->level_id] ?? 'masyarakat';
    }

    // Artikel yang dikelola akun pengguna ini
    public function artikel(): HasMany
    {
        return $this->hasMany(Artikel::class, 'penulis_id', 'id');
    }

    public function publicDocuments(): HasMany
    {
        return $this->hasMany(PublicDocument::class);
    }

    public function reportedComplaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'user_id');
    }

    public function assignedComplaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'assigned_to');
    }

    public function complaintUpdates(): HasMany
    {
        return $this->hasMany(ComplaintUpdate::class, 'updated_by');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'id_level');
    }
}
