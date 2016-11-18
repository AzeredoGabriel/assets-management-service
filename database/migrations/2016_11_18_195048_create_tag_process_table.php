<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_process', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('tag_id'); 
            $table->integer('process_id'); 
            $table->timestamps(); 

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('process_id')->references('id')->on('processes'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tag_process'); 
    }
}
