<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo');
            $table->date('date_adhesion');
            $table->string('statut');
            $table->json('historique_formations')->nullable();
            $table->integer('nombre_formations');
            $table->json('tasks')->nullable();
            $table->integer('AG_assistées');
            $table->integer('nombre_AG');
            $table->integer('teambuilding_assistés');
            $table->integer('nombre_teambuilding');
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
        Schema::dropIfExists('membres');
    }
}
