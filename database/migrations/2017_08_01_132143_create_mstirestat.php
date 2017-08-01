<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstirestat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('mstirestat', function (Blueprint $table) {
            $table->string('rec_usercreated',20);
            $table->string('rec_userupdate',20);
            $table->date('rec_datecreated');
            $table->date('rec_dateupdate');
            $table->increments('tirestat_code', 20)->unique();;
            $table->string('tirestat_desc', 20);

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
