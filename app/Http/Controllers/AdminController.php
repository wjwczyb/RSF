<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Permission;
use App\Role;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/home')->with('title','RunningSaltedFish后台管理');
    }
    // 权限管理页面
    public function permission_index(Request $request)   #权限
    {
        $permission=new permission;
        $res=$permission::where('permission_name','like','%'.$request['search'].'%')->where('permission_type','like','%'.$request['permission_type'].'%')->paginate(3);
        return view('admin/permission_index')->with('permissions',$res)->with('search',$request['search'])->with('title','权限管理')->with('permission_type',$request['permission_type']);
    }
    // 角色管理页面
    public function role_index(Request $request){      #角色
        $type=$request['role_type'];
        $search=$request['search'];
        $res=Role::where('role_name','like','%'.$search.'%')->where('role_type','like','%'.$type.'%')->paginate(3);
        return view('admin/role_index')->with('roles',$res)->with('search',$search)->with('title','角色管理')->with('role_type',$type);
    }
    // 新增权限方法
    public function AddPermissionFun(Request $request){
        $permission= new permission;
        if(!empty($request['permission_id'])){
            $res_permission=$permission::find($request['permission_id']);
            $res_permission->permission_name=$request['permission_name'];
            $res_permission->permission_describe=$request['permission_describe'];
            $res_permission->permission_type=$request['permission_type']=='operation'?'operation':'menu';
            $res_permission->permission_status=$request['permission_status']==1?1:0;
            $res=$res_permission->save();

        }else{
            $permission->permission_name=$request['permission_name'];
            $permission->permission_describe=$request['permission_describe'];
            $permission->permission_type=$request['permission_type']=='operation'?'operation':'menu';
            $permission->permission_status=$request['permission_status']==1?1:0;
            $res=$permission->save();
        };
        
        
    }

    // 新增角色或編輯角色的具體方法
    public function addRoleFunc(Request $request){
        $id=$request['role_id'];
        if (!empty($id)){ //更新
            $role=Role::find($id);
            $role->role_name=$request['role_name'];
            $role->role_describe=$request['role_describe'];
            $role->role_type=$request['role_type']=='operation'?'operation':'menu';
            $role->role_status=$request['role_status']==1?1:0;
            $res=$role->save();
        }else{
            $role=new role;
            $role->role_name=$request['role_name'];
            $role->role_describe=$request['role_describe'];
            $role->role_type=$request['role_type']=='operation'?'operation':'menu';
            $role->role_status=$request['role_status']==1?1:0;
            $res=$role->save();
        }
    }
    // 删除角色方法
    public function delete_role(Request $request){
        $res=Role::destroy($request['role_id']); //返回删除的条数
        return $res;
    }


    // 删除权限方法
    public function delete_permission(Request $request){
        $permission = new permission();
        $res=$permission::destroy($request['permission_id']); //返回删除的条数
        return $res;
    }

    // 启用禁用权限方法
    public function enable_permission(Request $request){
        $permission =new permission();
        $res_permission=$permission::find($request['permission_id']);
        $res=false;
        if($request['permission_status']==1){
           $res_permission->permission_status=0;
           $res=$res_permission->save();
        }else{
           $res_permission->permission_status=1;
           $res=$res_permission->save();
        }
        return json_encode($res) ;
    }

    public function enable_role(Request $request){
        $role=Role::find($request['role_id']);
        $res=false;
        if($request['role_status']==1){
            $role->role_status=0;
            $res=$role->save();
        }else{
            $role->role_status=1;
            $res=$role->save();
        }
        return json_encode($res);
    }
    // public function search_role(Request $request){
    //     $searchCondition=$request['searchCondition'];
    //     $res=$role::where('role_name','like','%'.$searchCondition.'%')->paginate(3);
    //     //return view('admin/role_index')->with('roles',$res)->with('search',$request['search'])->with('title','角色管理');
    //     return json_encode($res);
    // }
    // 增加或修改权限
    public function add_permission(Request $request){
        $permission= new permission;
        if($request['permission_id'] !=null ){
            
            $res_permission=$permission::find($request['permission_id']);
        }else{
            $res_permission=$permission;
        }
        return view('/admin/addPermission')->with('permission',$res_permission);
    }

    public function add_role(Request $request){         //增加或修改角色的中間處理方法，傳遞信息返回到增加界面，再做進一步的操作
        $id=$request['role_id'];
        if ($id!=null) {          //修改角色
            $role=Role::find($id);            
        }else{                 //增加角色
            $role=new role;
        }
        return view('/admin/addRole')->with('role',$role);
    }


}
