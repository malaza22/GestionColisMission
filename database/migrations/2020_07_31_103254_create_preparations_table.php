<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('preparations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('agencies_id');
            $table->string('personals_id');
            $table->string('date_preparation');
            $table->enum('status',['encours','envoi','final'])->default('encours');
            $table->foreign('agencies_id')->references('id')->on('agencies')->onDelete('cascade');
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
        Schema::dropIfExists('preparations');
    }
}
