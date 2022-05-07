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
            $table->integer('client_id');
            $table->integer('partenaire_id');
            $table->integer('evaluation_etoile');
            $table->string('commentaire_negatif');
            $table->string('commentaire_positif');
            $table->timestamps();
            $table->primary(array('client_id', 'partenaire_id'));

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
