<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AdminController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){
return "看什么看？没看过人家创业么？！这是测试内容！！";
});


Route::get('/testview',function(){
	return view('testview');
});


Route::get('/admin/index','AdminController@index');
Route::get('/admin/permission','AdminController@permission_index')->name('permission_indexss');
Route::get('/admin/role','AdminController@role_index')->name('role_indexss');
// Route::get('/admin/add_permission',function(){
// 	return view('/admin/AddPermission');
// });

Route::get('/admin/add_permission','AdminController@add_permission');
Route::get('/admin/add_role','AdminController@add_role');

Route::get('/admin/add_permission_fun','AdminController@AddPermissionFun');
Route::get('/admin/add_role_func',"AdminController@addRoleFunc");
Route::get('/admin/delete_role',"AdminController@delete_role");
Route::get('/admin/enable_role',"AdminController@enable_role");
Route::get('/admin/search_role',"AdminController@search_role");

// 删除权限路由，这里应该用 ResF 风格API？？？
Route::get('/admin/delete_permission',"AdminController@delete_permission");
Route::get('/admin/enable_permission',"AdminController@enable_permission");


// 银行管理
// Route::get('/bank/bank_info_manage',"BankManageController@bank_info_manage");
Route::get('/bank/bank_info_manage',"BankManageController@bank_info_manage");
Route::get('/bank/add_bank',"BankManageController@add_bank");

Route::get('/bank/bankCard',"BankManageController@bank_cards_manage");
Route::get('/bank/bank_cards_manage',"BankManageController@bank_cards_manage");
Route::get('/bank/addBankCard',"BankManageController@addOrEditBankCard");
Route::get('/bank/addBankCardPage',"BankManageController@addBankCardPage");
Route::get('/bank/delete_bankCard',"BankManageController@delete_bankCard");

Route::get('/bank/add_bank_func','BankManageController@add_bank_func')->name('add_bank_func');
Route::post('/bank/add_bank_logo','BankManageController@add_bank_logo')->name('add_bank_logo');
Route::get('/bank/delete_bank_info','BankManageController@delete_bank_info')->name('delete_bank_info');
Route::post('/bank/add_card_logo','BankManageController@add_card_logo')->name('add_card_logo');
// Route::post('/bank/pic_uploader','BankManageController@pic_uploader')->name('pic_uploader');

Route::get('/bank/bank_promotions_manage',"BankManageController@bank_promotions_manage");//银行卡优惠活动跳转
Route::get('/bank/addBankPromotionPage',"BankManageController@addBankPromotionPage");
Route::post('/bank/add_prom_logo','BankManageController@add_prom_logo')->name('add_bank_logo');
Route::get('/bank/addBankPromotion',"BankManageController@addBankPromotionFunc");
Route::get('/bank/deleteBankPromotion',"BankManageController@deleteBankPromotion");



//前台页面路由
Route::get('/Index/home',"IndexController@Index");