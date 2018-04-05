@extends('layouts.adminbase')
@section('content')
<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">
    <form class="am-form" action='{{route("permission_indexss")}}'>
      <div class="am-cf am-padding">
      </div>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id='add_permission' type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default am-btn-primary batch_delete"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}" name="permission_type">
              <option value=" " {{$permission_type==' '?'selected':''}}>全部</option>
              <option value="menu" {{$permission_type=='menu'?'selected':''}}>菜单类</option>
              <option value="operation" {{$permission_type=='operation'?'selected':''}}>操作类</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" name="search" value="{{$search}}">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-primary" type="submit" >搜索</button>
            </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" id='selectall'/></th><th class="table-id">ID</th>
                <th class="table-title">权限名称</th>
                <th class="table-type">权限描述</th>
                <th>是否启用</th>
                <th class="table-author am-hide-sm-only">权限类别</th>
                <th class="table-date am-hide-sm-only">创建时间</th>
                <th class="table-set">功能</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $permission)
              <tr>
                <td><input type="checkbox" class="selected_permission_id" value="{{$permission->id }}" /></td>
                <td><input type="hidden" class="permission_id" value='{{$permission->id }}'  > {{ $permission->id }}</td>
                <td>{{$permission->permission_name}}</td>
                <td>{{$permission->permission_describe}}</td>
                <td > <input type="hidden" class='permission_status' value='{{ $permission->permission_status }}'><span>{{$permission->permission_status==1?'已启用':'已禁用'}}</span></td>
                <td class="am-hide-sm-only">{{$permission->permission_type}}</td>
                <td class="am-hide-sm-only">{{$permission->created_at}}</td>
                <td>
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-primary am-radius single_edit"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button type="button" class="am-btn {{$permission->permission_status==1?'am-btn-warning':'am-btn-success'}}  am-radius single_enabled"><span class="am-icon-copy"></span> {{$permission->permission_status==1?'禁用':'启用'}}</button>
                    <button type="button" class="am-btn am-btn-danger am-radius single_delete"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="am-cf">
            <div class="am-fr">{!! $permissions->appends('search',$search)->links() !!}       </div>
          </div>
          <hr />
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- content end -->
</div>
<script type="text/javascript" charset="utf-8" async defer>

// 新增权限弹出按钮
$('#add_permission').click(function() {
        layer.open({
            type: 2,
            title: '增加权限',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/admin/add_permission',
            success:function(layero, index){
              console.log(layero, index);
            }
        });
    })


// 全选按钮
$('#selectall').click(function() {
        if ($(this).prop('checked')) {
            $('input').prop('checked', true)
        } else {
            $('input').prop('checked', false)
        }
    })


// 單個刪除功能
$('.single_delete').click(function() {
    
    var tr = $(this).parent().parent().parent(); //獲取整行數據,以備後續js返回成功后刪除
    var permission_id = $(this).parent().parent().parent().find('.permission_id').attr('value') //獲取要刪除的permission_id
        // layer 彈框控件
    layer.confirm('是否确认删除该权限？', {
            btn: ['是', '否']
        },
        function() {
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url: "delete_permission",
                type: 'get',
                data: {
                    'permission_id': permission_id
                },
                dataType: 'json',
                success: function(data) {
                    if (data > 0) {
                        layer.msg(data + '条删除成功！', {
                            icon: 1
                        });
                        $(tr).remove();
                    } else {
                        layer.msg('数据删除失败', {
                            icon: 2
                        });
                    }
                }
            });
            layer.close(index);
        },
        function() {
            layer.msg('已经取消删除', {
                icon: 7
            });
            layer.close(index);
        });
})

// 单个启用禁用权限
$('.single_enabled').click(function() {
    var index = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
    var thisbutton = $(this);
    var permission_id = $(thisbutton).parent().parent().parent().find('.permission_id').attr('value')  //获取permission_id
    var this_ob=        $(thisbutton).parent().parent().parent().find('.permission_status');
    var permission_status = $(this_ob).attr('value') //获取当前页面上的permission_status
    
    $.get("enable_permission", {
            'permission_id': permission_id,
            'permission_status': permission_status
        },
        function(data) {
            if(data){
               if(permission_status==1){
                  $(thisbutton).removeClass('am-btn-warning').addClass('am-btn-success').html("<span class='am-icon-copy'></span> 启用");
                  $(this_ob).attr('value',0).parent().find('span').text('已禁用')
                }else{
                  $(thisbutton).removeClass('am-btn-success').addClass('am-btn-warning').html("<span class='am-icon-copy'></span> 禁用");
                  $(this_ob).attr('value',1).parent().find('span').text('已启用')      
                }
            }            
            layer.close(index);
        },
        "json"); //这里返回的类型有：json,html,xml,text
})

// 批量删除功能
$('.batch_delete').click(function(){
    // 获取全部选中的checkbox
    var checkboxs=$('.selected_permission_id:checked');
    var permission_ids=[];
    var tr=$(checkboxs).parent().parent();
    $.each(checkboxs,function(){
      permission_ids.push(this.value);
    })
    layer.confirm('是否确认删除选中的'+permission_ids.length+'权限？', {
            btn: ['是', '否']
        },
        function() {
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });          
            $.ajax({
                url: "delete_permission",
                type: 'get',
                data: {
                    'permission_id': permission_ids
                },
                dataType: 'json',
                success: function(data) {
                    if (data > 0) {
                        layer.msg(data + '条删除成功！', {
                            icon: 1
                        });
                        $(tr).remove();
                    } else {
                        layer.msg('数据删除失败', {
                            icon: 2
                        });
                    }
                    layer.close(index);
                }
            });
        },
        function() {
            layer.msg('已经取消删除', {
                icon: 7
            });
            layer.close(index);
        }
    );
})


// 权限编辑功能
$('.single_edit').click(function() {
    var permission_id = $(this).parent().parent().parent().find('.permission_id').attr('value') //獲取要刪除的permission_id
    // layer 彈框控件
    layer.open({
            type: 2,
            title: '修改权限',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/admin/add_permission?permission_id='+permission_id
        });
});



</script>
@endsection