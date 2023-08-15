<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuatationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quatation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('quotaion_id');
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('weight')->nullable();
            $table->string('remarks')->nullable();
            $table->decimal('qty',20,2)->nullable();
            $table->decimal('price',20,2)->nullable();
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
        Schema::dropIfExists('quatation_details');
    }
}
