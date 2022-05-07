<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->string('prix_par_jour')->nullable();
            $table->date('date_desponibilite')->nullable();
            $table->integer('disponible');
            $table->string('ville');
            $table->integer('premium');
            $table->string('duree_premium');
            $table->integer('etat');
            $table->integer('id_utilisateur');
            $table->integer('type_vehicule');
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
        Schema::dropIfExists('annonces');
    }
}
