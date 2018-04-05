<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prom_name');//活动名
            $table->string('prom_username');//活动发布者
            $table->string('prom_bank');//活动银行
            $table->string('prom_channel');//活动频道，例如原创、好价、资讯、攻略
            $table->string('prom_type');//活动类型，例如网购或线下购物
            $table->string('prom_starttime');//活动开始时间
            $table->string('prom_endtime');//活动结束时间
            $table->string('prom_info');//活动详细信息
            $table->string('prom_url');//活动链接
            $table->string('prom_imgurl');//活动图片保存路径
            $table->string('prom_imgname');//活动图片保存名
            $table->string('prom_imginfo');//活动图片信息
            $table->integer('user_id');//对应发布者的外键
            $table->integer('bankinfo_id');//对应银行的外键           
            $table->integer('promchannel_id');//对应活动频道的外键
            $table->integer('promtype_id');//对应活动类型的外键
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
        Schema::dropIfExists('bank_promotions');
    }
}
