<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternalUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
