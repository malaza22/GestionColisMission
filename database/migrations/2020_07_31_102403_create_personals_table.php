<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('personals', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('agencies_id');
            $table->string('jobs_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->foreign('agencies_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::dropIfExists('personals');
    }
}
