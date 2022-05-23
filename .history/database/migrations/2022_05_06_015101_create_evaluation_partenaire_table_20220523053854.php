<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationPartenaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_partenaire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partenaire_id');
            $table->integer('client_id');
            $table->integer('annonce_id');
            $table->integer('evaluation_etoile')->nullable();
            $table->string('commentaire')->nullable();
            $table->integer('etat');
            $table->string('type_commentaire')->nullable();
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
        Schema::dropIfExists('evaluation_partenaire');
    }
}