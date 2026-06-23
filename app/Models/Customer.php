<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Customer extends Authenticatable
{
    protected $guard = 'customer';

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'name',
        'email',
        'phone',
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
