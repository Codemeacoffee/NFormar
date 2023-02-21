<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'name', 'surnames', 'address', 'country', 'password', 'advertising', 'rememberToken', 'confirmed', 'confirmationCode'
    ];

    protected $hidden = [
        'password', 'rememberToken', 'confirmationCode'
    ];
}