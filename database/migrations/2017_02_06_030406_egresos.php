<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Egresos.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:04:06pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Egresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('egresos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('cantidad');
        
        $table->date('fecha_egresos');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('articulo_id')->unsigned()->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
        
        $table->integer('departamento_id')->unsigned()->nullable();
        $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        
        
        
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
        Schema::drop('egresos');
    }
}
