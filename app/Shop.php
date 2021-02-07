<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'description',

        'extra_json',
    ];

    protected $casts = [
        'extra_json' => 'array'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
