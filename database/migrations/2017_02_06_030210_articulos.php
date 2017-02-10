<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Articulos.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:10pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Articulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('articulos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('descripcion');
        
        $table->integer('cant_total');
        
        /**
         * Foreignkeys section
         */
        
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
