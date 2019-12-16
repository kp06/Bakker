<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBakeryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bakery_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::table('bakery_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('B_id');
        
            $table->foreign('B_id')->references('id')->on('bakeries')->onDelete('cascade');
        });
        Schema::table('bakery_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('C_id');
        
            $table->foreign('C_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bakery_categories');
    }
}
