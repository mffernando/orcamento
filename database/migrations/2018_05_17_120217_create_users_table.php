<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->engine = "InnoDB";
            $table->increments('id');

            //user data
            $table->string('name', 50);
            //auth data
            $table->string('email', 80)->unique();
            $table->string('password', 254)->nullable();
            //permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes(); //deleted_at
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
		});
		Schema::drop('users');
	}
}