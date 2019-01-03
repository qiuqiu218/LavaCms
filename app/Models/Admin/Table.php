<?php

namespace App\Models\Admin;

use App\Models\Base;

class Table extends Base
{
    protected $fillable = [
        'name',
        'display_name',
        'is_sub_table',
        'is_classify',
        'is_comment',
        'is_search'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
