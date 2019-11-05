<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSlugUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
        Schema::table('games_categories', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
        Schema::table('games_tags', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
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
            $table->string('slug')->dropUnique();
        });
        Schema::table('games_categories', function (Blueprint $table) {
            $table->string('slug')->dropUnique();
        });
        Schema::table('games_tags', function (Blueprint $table) {
            $table->string('slug')->dropUnique();
        });
    }
}
