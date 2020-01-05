<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckRentProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE `check_rented`(now DATETIME)
            BEGIN
                DECLARE rent_id INT DEFAULT NULL;            
                DECLARE game_item_id INT DEFAULT NULL;            
                DECLARE done TINYINT DEFAULT FALSE;
                DECLARE rented_cursor
                 CURSOR FOR
                 SELECT 
                    t1.id,
                    t1.games_item_id
                   FROM front_user_games_item t1
                  WHERE expired_at < now 
                  AND expired = 0;
                  
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
                OPEN rented_cursor;           
                my_loop: LOOP
                  FETCH NEXT FROM rented_cursor INTO rent_id, game_item_id;            
                  IF done THEN
                    LEAVE my_loop; 
                  ELSE 
                    UPDATE front_user_games_item SET expired = 1 WHERE `id` = rent_id;
                    UPDATE games_items SET loaned = 0 WHERE `id` = game_item_id;
                  END IF;
                END LOOP;           
                CLOSE rented_cursor;
            END
        ";

        DB::unprepared("DROP procedure IF EXISTS check_rented");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure IF EXISTS check_rented");
    }
}
