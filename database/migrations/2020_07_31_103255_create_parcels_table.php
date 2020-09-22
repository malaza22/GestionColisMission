<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('parcels', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('preparations_id');
            $table->string('products_id');
            $table->string('quantity_products');
            $table->string('packagings_id')->nullable();
            $table->string('quantity_packagings')->nullable();
            $table->foreign('preparations_id')->references('id')->on('preparations')->onDelete('cascade');
            $table->foreign('packagings_id')->references('id')->on('packagings')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('parcels');
    }
}
