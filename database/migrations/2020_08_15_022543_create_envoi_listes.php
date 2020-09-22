<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateEnvoiListes extends Migration
{
    public function up()
    {
        DB::statement(
            "CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost`
            SQL SECURITY DEFINER VIEW `envoi_lists`
            AS SELECT
                `m`.`preparations_id` AS `id`,
                `m`.`date_send` AS `date_envoi`,
                `m`.`date_receive` AS `date_recevoir`,
                `m`.`status` AS `message`,
                `a`.`name` AS `agence`,
                `u`.`agencies_id` AS `users`
            FROM
                ((`mouvements` `m`
                join `agencies` `a` on((`a`.`id`= `m`.`agenciesdesti_id`))
                join `users` `u` on((`u`.`agencies_id`= `m`.`agenciesexpe_id`))
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
    public function creatView(): string
    {
        return  <<< SQL
        CREATE VIEW IF NOT EXISTS `envoi_lists` AS
        SELECT
            parcel.*,
            mouvements.status as types
        FROM parcel
        JOIN
            mouvements ON mouvments.id = parcel.mouvement_id ;

        SQL;
    }
    public function deleteView(): string
    {
        return  <<< SQL
           DROP VIEW IF EXISTS `envoi_lists`;
           SQL;
    }
}
