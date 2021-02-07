<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'shop_id',

        'name',
        'description',

        'price',

        'extra_json',
    ];

    protected $casts = [
        'extra_json' => 'array'
    ];

    protected $with = [
        'shop',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
