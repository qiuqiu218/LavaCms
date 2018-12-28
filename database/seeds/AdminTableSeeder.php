<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\Admin::query()->create([
            'username' => 'admin',
            'nickname' => '万鑫',
            'password' => '111111'
        ]);
    }
}
