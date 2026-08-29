<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = [
        'ip_address',
        'session_id',
        'path',
        'url',
        'method',
        'user_agent',
        'referer',
    ];

    /**
     * Scope a query to only include records from the last N days.
     */
    public function scopeLastDays($query, int $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days)->startOfDay());
    }

    /**
     * Scope a query to today.
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }
}
