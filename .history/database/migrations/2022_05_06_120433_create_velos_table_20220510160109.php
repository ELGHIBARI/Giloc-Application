<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('velos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marque');
            $table->string('taille');
            $table->longText('images_vélo');
            $table->integer('annonce_id')->unsigned();
            $table->foreign('annonce_id')
            ->references('id')->on('annonces')
            ->onDelete('cascade');
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
        Schema::dropIfExists('velos');
    }
}