<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin',
	        'type' => 'admin',
	        'email' => 'admin@example.com',
	        'password' => bcrypt('admin'),
	        'nic' => '123456789',
	        'address' => 'Somewhere I belong',
	        'created_at' => now(),
	        'updated_at' => now(),
	        'image' => '_admin/img/avatar.png',
	        'last_login' => now(),
	        'last_login_ip' => '127.0.0.1'
        ]);
    }
}
