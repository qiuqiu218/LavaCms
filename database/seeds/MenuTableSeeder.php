<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
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
				'name' => 'system',
				'title' => '系统',
				'children' => [
					[
						'name' => 'menu',
						'title' => '菜单管理'
					]
				]
			],
			[
				'name' => 'info',
				'title' => '信息'
			],
			[
				'name' => 'member',
				'title' => '用户',
				'children' => [
					[
						'name' => 'admin',
						'title' => '管理员',
						'children' => [
							[
								'name' => 'admin list',
								'title' => '列表管理',
								'route' => ''
							],
							[
								'name' => 'admin role',
								'title' => '角色管理',
								'route' => ''
							],
							[
								'name' => 'admin permission',
								'title' => '权限管理',
								'route' => ''
							]
						]
					],
					[
						'name' => 'user',
						'title' => '会员',
						'children' => [
							[
								'name' => 'user list',
								'title' => '列表管理',
								'route' => ''
							],
							[
								'name' => 'user role',
								'title' => '角色管理',
								'route' => ''
							],
							[
								'name' => 'user permission',
								'title' => '权限管理',
								'route' => ''
							]
						]
					]
				]
			]
		];
		\App\Models\Admin\Menu::buildTree($categories);
	}

}
