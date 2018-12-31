<?php

namespace App\Models\Admin;

use App\Models\Base;

class User extends Base
{
    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
        'nickname',
        'name'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
