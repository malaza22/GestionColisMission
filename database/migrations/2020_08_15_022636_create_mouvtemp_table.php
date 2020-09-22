<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvtempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `mouvtemp`
             AFTER INSERT ON `mouvements` FOR EACH
             ROW DELETE FROM `mouvement_temporaries`
             WHERE `mouvement_temporaries`.`preparations_id` = new.preparations_id
             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->delete());
    }

    public function delete(): string
    {
        return  <<< SQL
           DROP VIEW IF EXISTS `mouvtemp`;
           SQL;
    }
}
