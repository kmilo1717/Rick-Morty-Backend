<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ["name","status","species","type","gender","origin","location","image","episode","url","created"];
    protected $table = 'characters';
    public $timestamps = false;

    protected $casts = [
        'origin' => 'array',
        'location' => 'array',
        'episode' => 'array',
    ];
}
