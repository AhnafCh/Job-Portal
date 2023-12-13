<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'circularID', 'seekerID', 'employerEmail',
    ]; 
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
