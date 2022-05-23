<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom_complet')->after('email')->nullable();
            $table->string('ville')->after('nom_complet')->nullable();
            $table->string('role')->after('ville')->nullable();
            $table->string('avatar')->after('role')->default('default.jpg');
            $table->string('numero_telephone')->after('photo')->nullable();
            $table->string('etat')->after('numero_telephone')->default('1');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
