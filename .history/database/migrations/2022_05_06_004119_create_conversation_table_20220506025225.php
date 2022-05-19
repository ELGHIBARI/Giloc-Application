<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('annonce_id')->unsigned();
                $table->integer('client_id')->unsigned();
                $table->integer('partenaire_id')->unsigned();
                $table->timestamps();
                $table->foreign('annonce_id')
                ->references('id')->on('annonces')
                ->onDelete('cascade');

                $table->foreign('client_id')
                ->references('id')->on('users')
                ->onDelete('cascade');   

                $table->foreign('partenaire_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

                $table->primary(array('id_annonce', 'id_client','id_partenaire'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation');
    }
}
