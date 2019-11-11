<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvgRateView extends Migration
{
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
        return "CREATE VIEW `rate_avgs` AS SELECT 
        `game_id`, floor(avg(`rate`) * 2 + 0.5) / 2 as `rounded_rate`,avg(`rate`) as `rate` 
        FROM `rates` GROUP BY `game_id`";
    }

    private function dropView()
    {
        return "DROP VIEW IF EXISTS `rate_avgs`";
    }
}
