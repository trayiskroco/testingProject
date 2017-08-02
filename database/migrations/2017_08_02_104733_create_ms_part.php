<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_part', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('part_name');
            $table->integer('part_produkcode');
            $table->double('part_price');
            $table->integer('part_unitcode');
            $table->integer('part_qty');
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
        Schema::drop('ms_part');
    }
}
