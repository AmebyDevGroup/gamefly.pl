<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreign('pegi_id')->references('id')->on('pegis');
        });
        Schema::table('game_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->change();
            $table->unsignedBigInteger('game_id')->change();
            $table->foreign('tag_id')->references('id')->on('games_tags');
            $table->foreign('game_id')->references('id')->on('games');
        });
        Schema::table('games_items', function (Blueprint $table) {
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['pegi_id']);
        });
        Schema::table('game_tag', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['game_id']);
        });
        Schema::table('games_items', function (Blueprint $table) {
            $table->dropForeign(['game_id']);
        });
    }
}
