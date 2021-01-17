<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroMemorycardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_memorycard', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('hero_id');
            $table->foreign('hero_id')->references('id')->on('heroes');

            $table->unsignedBigInteger('memorycard_id');
            $table->foreign('memorycard_id')->references('id')->on('memorycards');

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
        Schema::dropIfExists('hero_memorycard');
    }
}
