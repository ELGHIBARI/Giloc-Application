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
            $table->integer('partenaire_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('evaluation_etoile');
            $table->string('commentaire_negatif');
            $table->string('commentaire_positif');
            $table->timestamps();
            $table->foreign('client_id')
            ->references('id')->on('users')
            ->onDelete('cascade');   

            $table->foreign('partenaire_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->primary(['partenaire_id', 'client_id']);	
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
