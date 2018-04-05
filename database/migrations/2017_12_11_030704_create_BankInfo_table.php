<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name');
            $table->string('bank_type');
            $table->integer('parent_bank_id');
            $table->integer('bank_level');
            $table->string('bank_addr1');
            $table->string('bank_addr2');
            $table->string('bank_logo')->nullable();
            $table->string('contacts');
            $table->string('contact_phone');
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
        Schema::dropIfExists('BankInfo');
    }
}
