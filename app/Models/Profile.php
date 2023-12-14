<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Profile.php
class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'mobile', 'web', 'fab', 'git', 'address', 'dp', 'skills'];

    protected $casts = [
        'skills' => 'array',
    ];
}
