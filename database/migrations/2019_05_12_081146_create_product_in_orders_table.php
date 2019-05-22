<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_in_orders', function (Blueprint $table) {
            $table->integer('quantity');
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->foreign('id_order')->references('id')->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_product')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(array('id_order', 'id_product'));
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
        Schema::dropIfExists('product_in_orders');
    }
}
