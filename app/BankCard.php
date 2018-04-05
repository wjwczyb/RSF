<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{
    protected $table = 'bank_cards';
    public function bankInfo(){
    	return $this->belongsTo('App\BankInfo','bankinfo_id');
    }
    
}
