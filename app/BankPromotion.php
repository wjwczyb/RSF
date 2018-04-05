<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankPromotion extends Model
{
    protected $table = 'bank_promotions';
    
    public function bankInfo(){
    	return $this->belongsTo('App\BankInfo','bankinfo_id');
    }
}
