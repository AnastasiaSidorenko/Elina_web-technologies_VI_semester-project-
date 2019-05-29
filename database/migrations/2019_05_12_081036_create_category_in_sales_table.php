<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryInSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_in_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_category')->unsigned();
            $table->bigInteger('id_sale')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_sale')->references('id')->on('sales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(array('id_category', 'id_sale'));
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
        Schema::dropIfExists('category_in_sales');
    }
}
