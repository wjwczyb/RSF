<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function index()
    {
        return view('Index/home')->with('title','信用卡本地优惠信息');
    }






    
}
