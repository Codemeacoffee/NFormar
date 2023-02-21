<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'courseId'
    ];
}
