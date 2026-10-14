<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_number',
        'complaint_category_id',
        'user_id',
        'assigned_to',
        'title',
        'description',
        'location',
        'attachment_path',
        'status',
        'verified_at',
        'resolved_at',
    ];

    protected function casts(): array
    {
        return [
            'verified_at' => 'datetime',
            'resolved_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ComplaintCategory::class, 'complaint_category_id');
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function updates(): HasMany
    {
        return $this->hasMany(ComplaintUpdate::class);
    }
}
