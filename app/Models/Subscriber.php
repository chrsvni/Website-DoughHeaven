<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'status',
        'token_unsubscribe',
    ];

    /**
     * Scope query to only active subscribers.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Check if subscriber is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'aktif';
    }
}
