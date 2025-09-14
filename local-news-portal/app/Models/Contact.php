<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'phone',
        'email',
        'address',
        'is_primary',
        'sort_order'
    ];

    protected $casts = [
        'is_primary' => 'boolean'
    ];
}
