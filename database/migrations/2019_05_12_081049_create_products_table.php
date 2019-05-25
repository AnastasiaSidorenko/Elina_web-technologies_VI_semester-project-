<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('description_en',1200);
            $table->string('description_ru',1200);
            $table->float('price',8,2);
            $table->string('ingredients',1200);
            $table->string('suggested_use_en',250);
            $table->string('suggested_use_ru',250);
            $table->string('image1');
            $table->string('image2');
            $table->date('expiration_date');
            $table->integer('quantity');
            $table->bigInteger('id_category')->unsigned()->nullable();
            $table->bigInteger('id_manufacturer')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('id_manufacturer')->references('id')->on('manufacturers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
