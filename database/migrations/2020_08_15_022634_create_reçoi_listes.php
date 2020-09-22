<?php


use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateReçoiListes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`
            SQL SECURITY DEFINER VIEW `reçoi_lists`
            AS select
                `m`.`preparations_id` AS `id`,
                `m`.`date_send` AS `date_envoi`,
                `m`.`date_receive` AS `date_recevoir`,
                `m`.`status` AS `message`,
                `a`.`name` AS `agence`,
                `u`.`agencies_id` AS `users`
            from
                ((`mouvements` `m`
                    JOIN `agencies` `a` ON((`a`.`id` = `m`.`agenciesexpe_id`))
                    JOIN `users` `u` ON((`u`.`agencies_id` = `m`.`agenciesdesti_id`))
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
        CREATE VIEW IF NOT EXISTS `reçoi_lists` AS
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
           DROP VIEW IF EXISTS `reçoi_lists`;
           SQL;
    }
}
