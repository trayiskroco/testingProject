<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrTire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    {
             Schema::create('tr_tire', function (Blueprint $table) {
            $table->string('rec_usercreated',20);
            $table->string('rec_userupdate',20);
            $table->date('rec_datecreated');
            $table->date('rec_dateupdate');
            $table->increments('tire_vh_code', 20)->unique();;
            $table->string('tire_vh_tireincode', 20);
            $table->string('tire_vh_vhcode', 20);
            $table->string('tire_vh_tireposcode', 20);
            $table->string('tire_vh_datein', 20);
            $table->string('tire_vh_dateout', 20);
            $table->string('tire_vh_kmin', 20);
            $table->string('tire_vh_kmout', 20);
            $table->string('tire_vh_drvin', 20);
            $table->string('tire_vh_drvout', 20);
            $table->string('tire_vh_mekanikin', 20);
            $table->string('tire_vh_mekanikout', 20);
            $table->string('tire_vh_mekanikout', 20);


        }); 
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
