<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categories = [
			[
				'name' => 'menu',
				'display_name' => '栏目',
				'guard_name' => 'admin'
			],
			[
				'name' => 'menu2',
				'display_name' => '栏目2',
				'guard_name' => 'admin'
			]
		];
		\App\Models\Admin\Permission::query()->insert($categories);
    }
}
