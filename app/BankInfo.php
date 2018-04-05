<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    //
    protected $table = 'bank_info';
    public function bankCards(){
    	return $this->hasmany('App\BankCard','bankinfo_id');
    }
    public function bankPromotions(){ //爷爷通过儿子找孙子，银行通过附属的银行卡搜寻所有的活动
    	return $this->hasMany('App\BankPromotion','bankinfo_id');
    }
    
}
