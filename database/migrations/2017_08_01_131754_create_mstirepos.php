<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstirepos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('mstirepos', function (Blueprint $table) {
            $table->string('rec_usercreated',20);
            $table->string('rec_userupdate',20);
            $table->date('rec_datecreated');
            $table->date('rec_dateupdate');
            $table->increments('pos_code', 20)->unique();;
            $table->string('pos_desc', 20);

        }); 
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
