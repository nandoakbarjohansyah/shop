<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    protected $fillable = [
        'id', 'name', 'email', 'password', 'phone_number', 'address', 'district_id', 'activate_token',
        'status', 'created_at', 'updated_at'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
