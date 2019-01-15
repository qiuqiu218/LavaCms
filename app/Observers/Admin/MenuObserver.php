<?php

namespace App\Observers\Admin;

use App\Models\Admin\Menu;
use App\Models\Admin\Permission;

class MenuObserver
{
	/**
	 * @param Menu $menu
	 */
    public function created(Menu $menu)
    {
        Permission::query()->create([
        	'name' => $menu->name,
			'display_name' => $menu->title,
			'sort' => $menu->sort,
			'guard_name' => 'admin'
		]);
    }

	/**
	 * @param Menu $menu
	 */
    public function updated(Menu $menu)
    {
        $permission = Permission::query()->where('name', $menu->name)->first();
        if ($permission) {
        	$permission->display_name = $menu->title;
        	$permission->save();
		}
    }

	/**
	 * @param Menu $menu
	 */
    public function deleted(Menu $menu)
    {
		Permission::query()->where('name', $menu->name)->delete();
    }
}
