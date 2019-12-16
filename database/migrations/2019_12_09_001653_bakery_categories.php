<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BakeryCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bakery_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::table('bakery_category', function (Blueprint $table) {
            $table->unsignedBigInteger('bakery_id');
        
            $table->foreign('bakery_id')->references('id')->on('bakeries')->onDelete('cascade');
        });
        Schema::table('bakery_category', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
        
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bakery_categories');

        Schema::dropIfExists('bakery_categories');
             
    }
}
