<?php

namespace App\Models\Admin;

use App\Models\Base;

class Field extends Base
{
    protected $fillable = [
        'table_id',
        'name',
        'display_name',
        'type',
        'type_length',
        'element',
        'default_value',
        'option',
        'belong',
        'is_show',
        'is_import',
        'is_system',
        'sort'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
