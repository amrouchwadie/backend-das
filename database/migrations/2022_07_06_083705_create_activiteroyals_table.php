<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteroyalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activiteroyals', function (Blueprint $table) {
            $table->id();
            $table->string('typeactivite');
            $table->string('site');
            $table->string('commun');
            $table->string('douar');
            $table->string('programme');
            $table->string('secteur');
            $table->string('objectif');
            $table->double('couttotal');
            $table->double('coutannul');
            $table->string('typeprojet');
            $table->string('disponiblite');
            $table->string('etude');
            $table->string('autorisation');
            $table->string('finance');
            $table->string('typeoffre');
            $table->string('datedebut');
            $table->string('datefin');
            $table->string('etatavance');
            $table->string('percavance');
            $table->string('suiteobserve');
            $table->string('observation');
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
        Schema::dropIfExists('activiteroyals');
    }
}
