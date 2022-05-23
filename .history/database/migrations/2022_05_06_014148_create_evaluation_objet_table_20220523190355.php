<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationObjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_objet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('annonce_id');
            $table->integer('etat');
            $table->integer('evaluation_etoile')->nullable();
            $table->string('commentaire_negatif')->nullable();
            $table->string('commentaire_positif');
            $table->timestamps();
            $table->primary(array('client_id','annonce_id'));
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
        Schema::dropIfExists('evaluation_objet');
    }
}
