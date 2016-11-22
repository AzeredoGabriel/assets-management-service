<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_tag', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('file_id'); 
            $table->integer('tag_id'); 
            $table->timestamps(); 

            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('file_tag'); 
    }
}
