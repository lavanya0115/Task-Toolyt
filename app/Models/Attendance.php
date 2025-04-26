<?php

namespace App\Models;

use App\Models\ExternalUser;
use App\Models\InternalUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'internal_user_id,',
        'external_user_id,',
        'login_time',
        'logout_time',
    ];

    public function internalUser()
    {
        return $this->belongsTo(InternalUser::class, 'internal_user_id');
    }
    public function externalUser()
    {
        return $this->belongsTo(ExternalUser::class, 'external_user_id');
    }
}
