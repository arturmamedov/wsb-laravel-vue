<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',

        'price',

        'extra_json',
    ];

    protected $casts = [
        'extra_json' => 'array'
    ];
}
