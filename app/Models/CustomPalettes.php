<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPalettes extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'name',
        'colors'
    ];
}
