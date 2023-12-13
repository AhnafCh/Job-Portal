<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'company', 'companyid', 'title', 'detail',
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'companyid');
    }
}
