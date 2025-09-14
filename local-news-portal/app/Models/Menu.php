<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'url',
        'type',
        'parent_id',
        'sort_order',
        'is_active',
        'target'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('sort_order');
    }
}
