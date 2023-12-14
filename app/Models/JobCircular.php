<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCircular extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['employer_id', 'title', 'description', 'deadline'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

}
