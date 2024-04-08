<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn( $value ) => $value / 100,
            set: fn( $value ) => $value * 100,
        );
    }
}
