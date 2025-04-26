<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExternalUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'phone_2',
        'address',
        'dob',
    ];
    
}
