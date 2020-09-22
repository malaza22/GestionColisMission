<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('mouvement_temporaries', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('preparations_id');
            $table->string('agenciesexpe_id');
            $table->string('agenciesdesti_id');
            $table->string('services_id');
            $table->string('personals_id');
            $table->string('date_send');
            $table->enum('type',['envoi','reçue'])->default('envoi');
            $table->foreign('preparations_id')->references('id')->on('preparations')->onDelete('cascade');
            $table->foreign('agenciesdesti_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('agenciesexpe_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('personals_id')->references('id')->on('personals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mouvement_temporary');
    }
}
