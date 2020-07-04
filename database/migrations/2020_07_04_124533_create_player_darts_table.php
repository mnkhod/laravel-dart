<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerDartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_darts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("weight");
            $table->bigInteger("dart_weight");
            $table->text("dart_tungsten");
            $table->text("dart_set");
            $table->text("dart_flight");
            $table->text("dart_shaft");
            $table->text("dimensions");
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
        Schema::dropIfExists('player_darts');
    }
}
