<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bands', function (Blueprint $table) {
        $table->id();
        $table->string('name', 255);
        $table->text('description')->nullable();
        $table->string('website', 255)->nullable();
        $table->string('youtube', 255)->nullable();
        $table->tinyInteger('day')->default(1);
        $table->time('time_start', 0);
        $table->time('time_end', 0);
        $table->tinyInteger('publish')->default(0);
        $table->unsignedBigInteger('stage_id');
        $table->foreign('stage_id')->references('id')->on('stages');
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
        Schema::dropIfExists('bands');
    }
}
