<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\BankCard;
use App\BankPromotion;
use App\User;
use App\Permission;
use App\Role;
use App\BankInfo;
class BankManageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bank_info_manage(Request $request){
        //echo 1;
        $bankinfo= new BankInfo;
        $res=$bankinfo::where('bank_name','like','%'.$request['search'].'%')->paginate(3);
        return view('bank/bank_info_manage')->with('title','银行信息管理')->with('banks',$res)->with('search',$request['search']);


    }

    // 银行添加页面
    public function add_bank(Request $request){
        $banks=BankInfo::all();
        if($request->bank_id != null){
            $res=BankInfo::find($request['bank_id']);
            return view('/bank/add_bank')->with('bank',$res)->with('banks',$banks);
        }else{
            return view('/bank/add_bank')->with('banks',$banks);
        }
    }
    
    public function addBankCardPage(Request $request){//跳转到银行卡添加或编辑界面
        $bankCardId=$request['bankCardId'];
        if ($bankCardId!=null) {//根据是否传入卡id动态回显
            $bankCard=BankCard::find($bankCardId);
        }else{
            $bankCard=new bankCard;
        }
        $banks=BankInfo::all();//为所属银行下拉框提供数据
        return view('/bank/addOrEditBankCardPage')->with('bankCard',$bankCard)->with('banks',$banks);
    }
    public function bank_cards_manage(Request $request){//银行卡管理界面入口
        $type=$request['card_type'];
        $search=$request['search'];
        $res=BankCard::where('card_name','like','%'.$search.'%')->paginate(3);
        
        return view('/bank/bank_cards_manage')->with('bankCards',$res)->with('search',$search)->with('title','银行卡信息管理');
    }
    public function addOrEditBankCard(Request $request){
        $bankCard=new bankCard;
        $bankCardId=$request['bankCardId'];
        $bankId=$request['card_bank'];
        $bank=BankInfo::find($bankId);
        $bankName=$bank->bank_name;
        if (!empty($bankCardId)) {//id存在，则编辑
            $existBankCard=BankCard::find($bankCardId);
            $existBankCard->card_name=$request['card_name'];
            $existBankCard->card_type=$request['card_type'];
            $existBankCard->card_info=$request['card_info'];
            $existBankCard->card_bank=$bankName;
            $existBankCard->card_imgurl=$request->card_logo;
            $existBankCard->card_imgname="";
            $existBankCard->card_imginfo="";
            $existBankCard->bankinfo_id=$bankId;
            $ex=$existBankCard->save();
        }else{//id不存在，则添加
            $bankCard=new bankCard;
            $bankCard->card_name=$request['card_name'];
            $bankCard->card_type=$request['card_type'];
            $bankCard->card_info=$request['card_info'];
            $bankCard->card_bank=$bankName;
            $bankCard->card_imgurl=$request->card_logo;
            $bankCard->card_imgname="";
            $bankCard->card_imginfo="";
            $bankCard->bankinfo_id=$bankId;
            $ex=$bankCard->save();
        }
    }
    public function delete_bankCard(Request $request){ //删除银行卡信息
        $res=BankCard::destroy($request['bankCardId']); //返回删除的条数
        return $res;
    }
    // 银行添加功能
    public function add_bank_func(Request $request){
        $bankinfo= new BankInfo;
        $bankinfo->bank_name=$request->bank_name;
        $bankinfo->bank_type=$request->bank_type;
        $bankinfo->bank_level=$request->bank_level;
        $bankinfo->bank_addr1=$request->bank_addr1;
        $bankinfo->bank_addr2=$request->bank_addr2;
        $bankinfo->bank_logo=$request->bank_logo;
        $bankinfo->contacts=$request->contacts;
        $bankinfo->contact_phone=$request->contact_phone;
        $bankinfo->parent_bank_id=$request->parent_bank_id;
        $res_count=$bankinfo->where('bank_name',$request->bank_name)->get()->count();
        if($res_count>0){
            $res['insert_res']=false;
            $res['message']="请勿插入重复数据";
        }else{
            $tempres=$bankinfo->save();
            if($tempres){
                $res['insert_res']=true;
                $res['message']="插入成功";
            }else{
                $res['insert_res']=false;
                $res['message']="插入失败";
            }
            
        }
        return json_encode($res);
    }

    //图片上传测试
    public function add_bank_logo(Request $request){
        $file = $request->Filedata; // 不同环境可能获取方式有点不同，可以下打印观察一下 dd(Input());
        if($file->isValid())
        {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'uploads/thumb/';
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();
            $file->move($dir, $filename);
            $path = $dir . $filename;
            return $path;
        }
    }
    public function add_card_logo(Request $request){
        $file = $request->Filedata; // 不同环境可能获取方式有点不同，可以下打印观察一下 dd(Input());
        if($file->isValid())
        {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'uploads/thumb/';
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();
            $file->move($dir, $filename);
            $path = $dir . $filename;
            return $path;
        }
    }



    public function bank_promotions_manage(Request $request){//银行卡活动管理界面入口
        $search=$request['search'];
        $res=BankPromotion::where('prom_name','like','%'.$search.'%')->paginate(3);
        
        return view('/bank/bank_promotions_manage')->with('bankPromotions',$res)->with('search',$search)->with('title','银行卡活动信息管理');
    }
    public function addBankPromotionPage(Request $request){//跳转到银行活动添加或编辑界面
        $bankPromotionId=$request['bankPromotionId'];
        if ($bankPromotionId!=null) {//根据是否传入卡id动态回显
            $bankPromotion=BankPromotion::find($bankPromotionId);
        }else{
            $bankPromotion=new bankPromotion;
        }
        $bankInfos=BankInfo::all();//添加时设置所属银行信息
        //$promChannels=PromChannel::all();  后期设置活动类型和活动频道
        //$PromTypes=PromType::all();
        return view('/bank/addOrEditBankPromotionPage')->with('bankPromotion',$bankPromotion)->with('banks',$bankInfos);
    }

    public function add_prom_logo(Request $request){
        $file = $request->Filedata; // 不同环境可能获取方式有点不同，可以下打印观察一下 dd(Input());
        if($file->isValid())
        {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'uploads/thumb/';
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();
            $file->move($dir, $filename);
            $path = $dir . $filename;
            return $path;
        }
    }
    public function addBankPromotionFunc(Request $request){

        $bankPromotionId=$request['bankPromotionId'];
        $bankId=$request['prom_bank'];
        $promChannelId=$request['prom_channel'];
        $promTypeId=$request['prom_type'];
        $bank=BankInfo::find($bankId);
        $bankName=$bank->bank_name;
        // if (!empty($bankPromotionId)) {//id存在，则编辑
        //     $existBankPromotion=BankPromotion::find($bankPromotionId);
        //     $existBankPromotion->prom_name=$request['prom_name'];
        //     $existBankPromotion->prom_type=$request['prom_type'];
        //     $existBankPromotion->prom_info=$request['prom_info'];
        //     $existBankPromotion->prom_bank=$bankName;
        //     $existBankPromotion->Promotion_imgurl=$request->Promotion_logo;
        //     $existBankPromotion->Promotion_imgname="";
        //     $existBankPromotion->Promotion_imginfo="";
        //     $existBankPromotion->bankinfo_id=$bankId;
        //     $ex=$existBankPromotion->save();
        // }else{//id不存在，则添加
        $bankPromotion=new bankPromotion;
        $bankPromotion->prom_name=$request['prom_name'];
        $bankPromotion->prom_username="";
        $bankPromotion->prom_channel=$request['prom_channel'];
        $bankPromotion->prom_type=$request['prom_type'];
        $bankPromotion->prom_starttime=$request['prom_starttime'];
        $bankPromotion->prom_endtime=$request['prom_endtime'];
        $bankPromotion->prom_info=$request['prom_info'];
        $bankPromotion->prom_bank=$bankName;
        $bankPromotion->prom_url=$request['prom_url'];
        $bankPromotion->prom_imgurl=$request->prom_logo;
        $bankPromotion->prom_imgname="";
        $bankPromotion->prom_imginfo="";
        $bankPromotion->user_id=1123;
        $bankPromotion->bankinfo_id=$bankId;
        $bankPromotion->promchannel_id=$promChannelId;
        $bankPromotion->promtype_id=$promTypeId;

        $ex=$bankPromotion->save();
        // }
    }
    public function deleteBankPromotion(Request $request){ //删除银行活动信息
        $bankPromotions=BankPromotion::find($request['bankPromotionId']);
        $res=BankPromotion::destroy($request['bankPromotionId']); //传入id数组，可以批量删除 
        if (count($bankPromotions)>1) {
            foreach ($bankPromotions as $bankPromotion) {
                $promlogo_path=$bankPromotion->prom_imgurl;
                unlink($promlogo_path);
            }  
        }else{
            $promlogo_path=$bankPromotions->prom_imgurl;
            unlink($promlogo_path);
        }
              
        return $res;
    }

    public function delete_bank_info(Request $request){
        $bank_info=BankInfo::where('id',$request['bank_id'])->get();
        $bank_logo_path=$bank_info[0]->bank_logo;
        // unlink($bank_logo_path);
        $res=BankInfo::destroy($request['bank_id']); //返回删除的条数
        unlink($bank_logo_path);
        return $res;
    }


}
