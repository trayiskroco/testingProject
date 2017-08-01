<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiremastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiremasters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('type_id');
            $table->integer('size_id');
            $table->integer('brand_id');
            $table->double('km');
            $table->double('price');
            $table->string('partnumber');
            $table->integer('supplier');
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
        Schema::drop('tiremasters');
    }
}
