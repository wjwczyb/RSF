<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BankPromotion;

class IndexController extends Controller
{
    
    public function index()
    {
    	$promotions_res=BankPromotion::all();
    	// dd($promotions_res);

        return view('Index/home')->with('title','信用卡本地优惠信息')->with('promotions',$promotions_res);
    }






    
}
