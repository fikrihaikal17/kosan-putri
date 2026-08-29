<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Room extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'price_label',
        'capacity',
        'bathroom_type',
        'wifi',
        'electricity_included',
        'water_included',
        'availability_status',
        'is_active',
        'sort_order',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'capacity' => 'integer',
            'wifi' => 'boolean',
            'electricity_included' => 'boolean',
            'water_included' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Room $room) {
            if (empty($room->slug)) {
                $room->slug = Str::slug($room->name);
            }
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class)->orderBy('sort_order', 'asc');
    }

    public function primaryImage()
    {
        return $this->hasOne(RoomImage::class)->where('is_primary', true)->latestOfMany();
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class)->withTimestamps();
    }

    /**
     * Get display price string safely.
     */
    public function getFormattedPriceAttribute(): string
    {
        if ($this->price && $this->price > 0) {
            return 'Rp '.number_format($this->price, 0, ',', '.').' / bulan';
        }

        return $this->price_label ?: 'Hubungi untuk informasi harga';
    }

    /**
     * Get room image URL safely.
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        $primary = $this->images()->where('is_primary', true)->first() ?: $this->images()->first();
        if ($primary && $primary->image_path) {
            if (str_starts_with($primary->image_path, 'http') || str_starts_with($primary->image_path, '/')) {
                return $primary->image_path;
            }

            return asset('storage/'.$primary->image_path);
        }

        if (Str::contains(Str::lower($this->name), 'dalam')) {
            return asset('images/rooms/kamar-mandi-dalam.svg');
        }

        return asset('images/rooms/kamar-mandi-sharing.svg');
    }
}
