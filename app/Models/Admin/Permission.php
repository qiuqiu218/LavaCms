<?php

namespace App\Models\Admin;

class Permission extends \Spatie\Permission\Models\Permission
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'guard_name',
        'sort'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
