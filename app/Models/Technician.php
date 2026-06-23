<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Technician extends Authenticatable
{
    protected $guard = 'technician';

    protected $primaryKey = 'technician_id';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if (is_string($value) && $value !== '' && !preg_match('/^\$2y\$/', $value)) {
            $this->attributes['password_hash'] = Hash::make($value);
        } else {
            $this->attributes['password_hash'] = $value;
        }
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}
