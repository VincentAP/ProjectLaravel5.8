<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_flowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('flower_image')->nullable();
            $table->Text('description');
            $table->BigInteger('stock');
            $table->BigInteger('price');
            $table->String('name');
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
        Schema::dropIfExists('data_flowers');
    }
}
