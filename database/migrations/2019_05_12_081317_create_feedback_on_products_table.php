<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackOnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_on_products', function (Blueprint $table) {
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_feedback')->unsigned();
            $table->foreign('id_order')->references('id')->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_feedback')->references('id')->on('feedbacks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(array('id_order', 'id_feedback'));
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
        Schema::dropIfExists('feedback_on_products');
    }
}
