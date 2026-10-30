<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FloatingImage extends Model
{
    protected $fillable = [
        'title',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
