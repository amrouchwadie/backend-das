<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaisirEnMiseEnOuvresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saisir_en_mise_en_ouvres', function (Blueprint $table) {
            $table->id();
            $table->string('annee');
            $table->string('reference');
            $table->string('secteur');
            $table->string('intitule');
            $table->string('programme');
            $table->string('typeprojet');
            $table->float('coutglobal');
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
        Schema::dropIfExists('saisir_en_mise_en_ouvres');
    }
}
