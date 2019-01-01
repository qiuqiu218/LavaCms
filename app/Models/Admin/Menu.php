<?php
namespace App\Models\Admin;

use App\Models\Traits\Enum;
use Baum\Node;

/**
* Menu
*/
class Menu extends Node {

    use Enum;

    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'route',
        'type',
        'sort'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'lft',
        'rgt',
        'depth',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $enum = [
        'type' => [
            [
                'key' => 0,
                'value' => '通用菜单',
                'active' => true
            ],
            [
                'key' => 1,
                'value' => '系统菜单',
                'active' => false
            ]
        ]
    ];

    /**
     * @param $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $this->getEnumKey('type', $value);
    }

    /**
     * @param $value
     * @return null
     */
    public function getTypeAttribute($value)
    {
        $value = $value ? $value : 0;
        return $this->getEnumValue('type', $value);
    }

}
