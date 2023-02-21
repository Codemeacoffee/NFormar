<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'platformId', 'category', 'name', 'image', 'imageAlt', 'description', 'formativeInfo', 'price', 'oldPrice', 'newUntil'
    ];
}
