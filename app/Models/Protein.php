<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protein extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'imageInactive',
        'imageActive',
        'name',
        'description',
        'price',
    ];
}
