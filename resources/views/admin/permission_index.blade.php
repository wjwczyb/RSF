@extends('layouts.adminbase')
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
      </div>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id='add_permission' type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default am-btn-primary"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">全部</option>
              <option value="option2">菜单类</option>
              <option value="option3">操作类</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-primary" type="button">搜索</button>
            </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th>
                  <th class="table-title">权限名称</th>
                  <th class="table-type">权限描述</th>
                  <th class="table-author am-hide-sm-only">权限类别</th>
                  <th class="table-date am-hide-sm-only">创建时间</th>
                  <th class="table-set">功能</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>1</td>
                  <td><a href="#">DeleteUsers</a></td>
                  <td>删除用户</td>
                  <td class="am-hide-sm-only">操作类</td>
                  <td class="am-hide-sm-only">2017-02-08 19:43</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn am-btn-warning am-radius"><span class="am-icon-copy"></span> 停用</button>
                      <button type="button" class="am-btn am-btn-danger am-radius"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>2</td>
                  <td><a href="#">CardManage</a></td>
                  <td>卡管理</td>
                  <td class="am-hide-sm-only">菜单类</td>
                  <td class="am-hide-sm-only">2017-02-08 19:43</td>
                  <td>
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-primary am-radius"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn am-btn-warning am-radius"><span class="am-icon-copy"></span> 停用</button>
                      <button type="button" class="am-btn am-btn-danger am-radius"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </td>
                </tr>
     
 
   
              
              

              

              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
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

  $('#add_permission').click(function(){

          layer.open({
            type: 2,
            title: '增加权限',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/admin/add_permission'
          });
  })
 

</script>

@endsection