<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
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
