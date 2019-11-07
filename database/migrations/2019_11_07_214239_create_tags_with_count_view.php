<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsWithCountView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(self::dropView());
        DB::unprepared(self::createView());

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(self::dropView());
    }

    private function createView()
    {
        return "CREATE VIEW `tags_counts` AS SELECT 
        `games_tags`.`id`, `games_tags`.`name`, COUNT(`games_tags`.`id`) as `weight` 
        FROM `games_tags` 
        LEFT JOIN `game_tag` ON `games_tags`.`id` = `game_tag`.`tag_id` 
        WHERE `game_tag`.`game_id` IS NOT NULL group by `games_tags`.`id`";
    }

    private function dropView()
    {
        return "DROP VIEW IF EXISTS `tags_counts`";
    }
}
