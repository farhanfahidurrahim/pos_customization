<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quatations', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('client_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('fromany_activity')->nullable();
            $table->string('fropany_address')->nullable();
            $table->string('fompany_phone')->nullable();
            $table->string('fompany_email')->nullable();
            $table->string('quotation_no')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('created_name_phone')->nullable();
            $table->date('quotation_date')->nullable();
            $table->date('quotation_validity_date')->nullable();
            
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
        Schema::dropIfExists('quatations');
    }
}
