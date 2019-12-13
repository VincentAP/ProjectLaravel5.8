<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nameregister');
            $table->String('product_image')->nullable();
            $table->String('emailregister')->unique();
            $table->String('passregister');
            $table->BigInteger('phoneregister');
            $table->String('gender');
            $table->String('address');
            $table->String('role')->default("user");
            $table->Integer('login_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
