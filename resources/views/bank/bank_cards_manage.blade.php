@extends('layouts.adminbase')
@section('content')
<!-- content start -->

<div class="admin-content">
  <div class="admin-content-body">
    <form class="am-form" action='bankCard'>
      <div class="am-cf am-padding">
      </div>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id='add_bankCard' type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default am-btn-primary batch_delete" ><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field " name="search" value="{{$search}}">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-primary" type="submit">搜索</button>
            </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox" id="selectAll"/></th>
                  <th class="table-id">ID</th>
                  <th class="table-title">银行卡名称</th>
                  <th class="table-author am-hide-sm-only">发卡行</th>
                  <th class="table-type">银行卡类型</th>                  
                  <th>卡详细信息</th>
                  <th class="table-date am-hide-sm-only">创建时间</th>
                  <th class="table-set">功能</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @foreach ($bankCards as $bankCard)
                 <tr>
                  <td><input type="checkbox" class="singleSelected" value="{{$bankCard->id}}" /></td>
                  <td><input class='bankCardId' type="hidden" value="{{ $bankCard->id }}" >{{ $bankCard->id }}</td>
                  <td>{{$bankCard->card_name}}</td>
                  <td>{{$bankCard->card_bank}}</td>
                  <td>{{$bankCard->card_type}}</td>
                  <td class="am-hide-sm-only">{!! $bankCard->card_info !!}</td>
                  <td class="am-hide-sm-only">{{$bankCard->created_at}}</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius single_edit"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      
                      <button type="button" class="am-btn am-btn-danger am-radius single_delete"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                 {!! $bankCards->appends('search',$search)->links() !!}
              </div>
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

// 新增银行卡弹出按钮
$('#add_bankCard').click(function() {
        layer.open({
            type: 2,
            title: '增加银行卡',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/bank/addBankCardPage',
            success:function(layero, index){
              console.log(layero, index);
            }
        });
    })


// 全选按钮
$('#selectAll').click(function() {
        if ($(this).prop('checked')) {
            $('input').prop('checked', true)
        } else {
            $('input').prop('checked', false)
        }
    })



// 單個刪除功能
$('.single_delete').click(function() {
    
    var tr = $(this).parent().parent().parent(); //獲取整行數據,以備後續js返回成功后刪除
    var bankCardId = $(this).parent().parent().parent().find('.bankCardId').attr('value') //獲取要刪除的id
    alert(bankCardId);
        // layer 彈框控件
    layer.confirm('是否确认删除该卡信息？', {
            btn: ['是', '否']
        },
        function() {
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url: "delete_bankCard",
                type: 'get',
                data: {
                    'bankCardId': bankCardId
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


// 批量删除功能
$('.batch_delete').click(function(){
    // 获取全部选中的checkbox
    alert(1);
    var checkboxs=$('.singleSelected:checked');
    var bankcard_ids=[];
    var tr=$(checkboxs).parent().parent();
    $.each(checkboxs,function(){
      bankcard_ids.push(this.value);
    })
    layer.confirm('是否确认删除选中的'+bankcard_ids.length+'权限？', {
            btn: ['是', '否']
        },
        function() {
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });          
            $.ajax({
                url: "delete_bankCard",
                type: 'get',
                data: {
                    'bankCardId': bankcard_ids
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