<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreatePreparationListes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost`
            SQL SECURITY DEFINER VIEW `preparation_listes`
            AS SELECT
                `pr`.`id` AS `id`,
                `pr`.`status` AS `Type`,
                `pr`.`date_preparation` AS `date_preparation`,
                `a`.`name` AS `Agence`,
                `p`.`lastname` AS `Coursier`,
                `u`.`agencies_id` AS `Users`
            FROM
                ((`preparations` `pr`
                    JOIN `agencies` `a` ON ((`a`.`id` = `pr`.`agencies_id`))
                    JOIN `personals` `p` ON (( `p`.`id` = `pr`.`personals_id`))
                    JOIN `users` `u` ON((`u`.`agencies_id` = `p`.`agencies_id`))
                ))"
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->deleteView());
    }

    public function deleteView(): string
    {
        return  <<< SQL
           DROP VIEW IF EXISTS `preparation_listes`;
           SQL;
    }
}
