<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('mstire', function (Blueprint $table) {
            $table->string('rec_usercreated',20);
            $table->string('rec_userupdate',20);
            $table->date('rec_datecreated');
            $table->date('rec_dateupdate');
            $table->increments('tire_code', 20)->unique();;
            $table->date('tire_date');
            $table->string('tire_tireloccode',20);
            $table->string('tire_tirestatcode',20);
            $table->string('tire_tireprice',20);
            $table->string('tire_stamp',20);
            $table->string('tire_sn',20);
            $table->string('tire_size',20); 
            $table->string('tire_brand',20); 
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
        Schema::drop('mstire');
    }
}
