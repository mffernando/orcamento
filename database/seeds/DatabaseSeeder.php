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
		'name'		=> 'admin',
		'email'		=> 'admin@sistema.com',
		'password'	=> bcrypt('123456'),
        ]);
    }
}
