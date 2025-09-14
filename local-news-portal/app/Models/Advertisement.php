<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Advertisement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link_url',
        'position',
        'type',
        'ad_code',
        'is_active',
        'start_date',
        'end_date',
        'click_count',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where(function($q) {
                        $q->whereNull('start_date')
                          ->orWhere('start_date', '<=', Carbon::now());
                    })
                    ->where(function($q) {
                        $q->whereNull('end_date')
                          ->orWhere('end_date', '>=', Carbon::now());
                    });
    }

    public function scopeByPosition($query, $position)
    {
        return $query->where('position', $position);
    }
}
