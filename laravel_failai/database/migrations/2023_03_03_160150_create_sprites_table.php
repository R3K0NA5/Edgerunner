<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprites', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('imgIdle');
            $table->string('imgRun');
            $table->string('imgJump');
            $table->string('imgFall');
            $table->string('imgIdleLeft');
            $table->string('imgRunLeft');
            $table->string('imgJumpLeft');
            $table->string('imgFallLeft');
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
        Schema::dropIfExists('sprites');
    }
}
