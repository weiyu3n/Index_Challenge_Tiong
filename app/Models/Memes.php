<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memes extends Model
{
    protected $fillable = [
        'name',
        'url',
        'page',
    ];

}
