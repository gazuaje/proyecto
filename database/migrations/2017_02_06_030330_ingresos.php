<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Ingresos.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:03:30pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ingresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('ingresos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('cantidad');
        
        $table->date('fecha_ingresos');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('departamento_id')->unsigned()->nullable();
        $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        
        $table->integer('articulo_id')->unsigned()->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
        
        
        $table->timestamps();
        
        
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
        Schema::drop('ingresos');
    }
}
