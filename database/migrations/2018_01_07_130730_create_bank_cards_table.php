<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_name');
            $table->string('card_type');
            $table->string('card_bank');//卡所属银行
            $table->string('card_info');//卡信息简介
            $table->string('card_imgurl')->nullable();//卡图片保存路径
            $table->string('card_imgname')->nullable();//卡图片保存文件名
            $table->string('card_imginfo')->nullable();//卡图片详细信息            
            $table->integer('bankinfo_id')->nullable();//对应银行的外键,外键名应该跟model名相关，而不是表名
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
        Schema::dropIfExists('bank_cards');
    }
}
