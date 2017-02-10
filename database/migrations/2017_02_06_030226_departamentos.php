<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Departamentos.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:26pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Departamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('departamentos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('descripcion');
        
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
        Schema::drop('departamentos');
    }
}
