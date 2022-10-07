<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramme3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme3s', function (Blueprint $table) {
            $table->id();
            $table->string('programme3')->default('programme 3');
            $table->string('annee');
            $table->string('site');
            $table->string('commun');
            $table->string('douar');
            $table->string('proact');
            $table->string('intitule');
            $table->string('sousprojet');
            $table->string('typeprojet');
            $table->string('natureinterv');
            $table->double('qte');
            $table->double('cout');
            $table->string('demcible');
            $table->string('probcible');
            $table->string('freindev');
            $table->double('qtetotal');
            $table->double('partindh');
            $table->string('delai');
            $table->string('ntrben');
            $table->string('nbrben');
            $table->unsignedBigInteger('partenir_id');
            $table->foreign('partenir_id')->references('id')->on('partenirs')->onDelete('cascade');
            $table->string('validation')->default("Devalider");
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
        Schema::dropIfExists('programme3s');
    }
}
