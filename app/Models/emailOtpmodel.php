<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailotpmodel extends Model
{
    use HasFactory;

    protected $table = 'email_otps';
    protected $fillable = [
        'email',
        'otp'
    ];
}
