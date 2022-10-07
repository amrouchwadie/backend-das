<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificationppdhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificationppdhs', function (Blueprint $table) {
            $table->id();
            $table->string('annee')->default('2023');
            $table->string('programme');
            $table->string('typeprojet');
            $table->string('demensioncible');
            $table->string('problemcible');
            $table->string('freindev');
            $table->string('nbrprojet');
            $table->bigInteger('couttotal');
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
        Schema::dropIfExists('planificationppdhs');
    }
}
