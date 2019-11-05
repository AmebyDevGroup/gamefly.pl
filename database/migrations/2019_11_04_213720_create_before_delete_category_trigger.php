<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeforeDeleteCategoryTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_Before_Delete_Game_Category BEFORE UPDATE ON `games_categories` FOR EACH ROW
            BEGIN
                DECLARE relation_count INT;
                IF ((IFNULL(NEW.deleted_at, \'\') <> IFNULL(OLD.deleted_at, \'\')) && NEW.deleted_at IS NOT NULL)  THEN
                    set relation_count = (SELECT count(*) FROM `games` WHERE `games`.`category_id` = NEW.id);
                    IF relation_count > 0 THEN
                        INSERT INTO `games_categories_audit` (`name`, `slug`, `description`)  VALUES (relation_count, NEW.id, OLD.id);
                        signal sqlstate \'45000\' set message_text = \'Cannot delete a row that has relationships!\';
                    END IF;
                END IF;
            END
        ');
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Before_Delete_Game_Category`');
    }
}
