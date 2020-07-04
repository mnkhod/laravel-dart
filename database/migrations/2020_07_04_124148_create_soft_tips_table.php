<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soft_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->bigInteger("barrel_weight");
            $table->bigInteger("full_weight");
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
        Schema::dropIfExists('soft_tips');
    }
}
