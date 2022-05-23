<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('partenaire_id');
            $table->integer('annonce_id');
            $table->integer('etat');
            $table->integer('evaluation_etoile')->nullable();
            $table->string('commentaire')->nullable();
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
        Schema::dropIfExists('evaluation_client');
    }
}
