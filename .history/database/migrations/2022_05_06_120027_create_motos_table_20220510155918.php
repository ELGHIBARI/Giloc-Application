<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->increments('id');
            $table->year('Année_Modèle');
            $table->string('modele');
            $table->integer('Nombre_roues');
            $table->string('marque');
            $table->string('Cylindree');
            $table->integer('nombre_casques');
            $table->longText('images_moto');
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
        Schema::dropIfExists('motos');
    }
}
