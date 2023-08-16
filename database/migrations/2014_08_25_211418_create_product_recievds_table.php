<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRecievdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_recievds', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('transaction_id')->nullable();
            $table->bigInteger('purchase_line_id');
            $table->bigInteger('sell_line_id');
            $table->decimal('quantity',8,2)->nullable()->default(0);
            $table->string('ref_no')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('product_recievds');
    }
}
