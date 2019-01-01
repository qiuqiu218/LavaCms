<?php

namespace App\Models\Admin;

class Role extends \Spatie\Permission\Models\Role
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'guard_name'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
