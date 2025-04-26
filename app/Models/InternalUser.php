<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalUser extends Model
{
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
