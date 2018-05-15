<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCompaniesTable.
 */
class CreateCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
            
			//company data
            $table->increments('id');
            $table->char('cnpj', 14)->unique();
            $table->string('name', 50);
            $table->char('phone', 11);
            $table->char('mobile', 12)->nullable();
            $table->string('address', 50)
            
            //auth data
            $table->string('email', 80)->unique();
            $table->string('password', 254);

            //permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.company');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function(Blueprint $table){
			
		});

		Schema::drop('companies');
	}
}
