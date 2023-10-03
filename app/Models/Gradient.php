<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradient extends Model
{
    use CrudTrait;
    use HasFactory;


    protected $fillable = [
        'user_id',
        'gradient_name',
        'colors',
        'angle',
    ];

    protected $casts = [
        'colors' => 'string'
    ];
}
