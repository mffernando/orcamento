<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
		'name'		=> 'Admin',
		'email'		=> 'sistema@sistema.com',
		'password'	=> env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);
    }
}
