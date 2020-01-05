<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontUserGamesItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_user_games_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->unsignedBigInteger('front_user_id');
            $table->unsignedBigInteger('games_item_id');
            $table->float('price');
            $table->boolean('expired')->default(0);
            $table->timestamp('expired_at');
            $table->timestamps();

            $table->foreign('front_user_id')->references('id')->on('front_users');
            $table->foreign('games_item_id')->references('id')->on('games_items');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('front_user_games_item');
    }
}
