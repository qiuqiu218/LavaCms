<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'path',
        'mime',
        'size',
        'is_admin'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getPathAttribute($value)
    {
        return Storage::url($value);
    }
}
