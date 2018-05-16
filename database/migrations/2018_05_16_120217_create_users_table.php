<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			//user data
            $table->increments('id');
            $table->string('name', 50);
            
            //auth data
            $table->string('email', 80)->unique();
            $table->string('password', 254);

            //permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table){
			
		});

		Schema::drop('users');
	}
}
