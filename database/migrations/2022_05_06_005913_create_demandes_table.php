<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->double('prix_total');
            $table->integer('etat_demande');
            $table->integer('annonce_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->foreign('client_id')
            ->references('id')->on('users')
            ->onDelete('cascade');   

            $table->foreign('annonce_id')
            ->references('id')->on('annonces')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
