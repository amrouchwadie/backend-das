<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGcPermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gc_perms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gc_id');
            $table->foreign('gc_id')->references('id')->on('gcs')->onDelete('cascade');
            $table->unsignedBigInteger('perm_id');
            $table->foreign('perm_id')->references('id')->on('perms')->onDelete('cascade');
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
        Schema::dropIfExists('gc_perms');
    }
}
