<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Amaze UI Admin index Examples</title>
        <meta name="description" content="这是一个 index 页面">
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link rel="icon" type="image/png" href="{{asset('AmazeUI/i/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('AmazeUI/i/app-icon72x72@2x.png')}}">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        
        <link href="{{ asset('AmazeUI/css/amazeui.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('AmazeUI/css/admin.css')}}">
        <script src="{{ asset('js/lib/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('AmazeUI/js/amazeui.js') }}"></script>
        <script src="{{ asset('AmazeUI/js/app.js')}}"></script>
    </head>
    <body>
        <header class="am-topbar am-topbar-inverse">
            <h1 class="am-topbar-brand">
            <a href="#" class="am-text-ir"></a>
            </h1>
            <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse-2'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
            <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse-2">
                <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                    <li><a href="javascript:;"><span class="am-mark"><span class="am-icon-bell"></span> 信息<sup>99+</sup></span></a></li>
                    <li class="am-dropdown" data-am-dropdown>
                        <a  class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <span class="am-mark"><span class="am-icon-calendar-check-o"></span> 进度<sup>12</sup></span>
                            <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li class="am-dropdown-header">进度列表</li>
                            <li><a href="#">Amaze UI</a></li>
                            <li class="am-active"><a href="#">Amaze UI Touch</a></li>
                            <li><a href="#">Amaze UI React</a></li>
                        </ul>
                    </li>
                    <li class="am-dropdown" data-am-dropdown>
                        <a  class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <img class="admin-user-ico" src="{{asset('AmazeUI/img/user.png')}}" alt=""> 禁言小张
                            <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li class="am-dropdown-header">个人资料</li>
                            <li><a href="#">资料设置</a></li>
                            <li class="am-active"><a href="#">个人中心</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;"><span class="am-icon-close"></span> 退出</a></li>
                </ul>
            </div>
        </header>
        <div class="am-cf admin-main">
            <!-- sidebar start -->
            <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
                <div class="am-offcanvas-bar admin-offcanvas-bar">
                    <ul class="am-list admin-sidebar-list">
                        <li class="am-list-title">日常使用</li>
                        <li class="am-panel">
                            <a href="admin-index.html"><i class="am-list-ico am-icon-home am-margin-left-sm"></i> 首页</a>
                        </li>
                        
                        <li class="am-panel">
                            <a data-am-collapse="{parent: '#collapase-nav-1', target: '#user-nav'}">
                                <i class="am-list-ico am-icon-file am-margin-left-sm"></i> 页面 <i class="am-icon-angle-right am-fr am-margin-right"></i>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="user-nav">
                                <li><a href="admin-form.html"><i class="am-list-ico am-icon-check am-margin-left-sm"></i> 表单 </a></li>
                                <li><a href="admin-table.html"><i class="am-list-ico am-icon-table am-margin-left-sm"></i> 表格 </a></li>
                            </ul>
                        </li>
                        <li class="am-list-title">其他分类</li>
                        <li class="am-panel">
                            <a href="admin-gallery.html">
                                <i class="am-list-ico am-icon-th am-margin-left-sm"></i> 相册 </i>
                            </a>
                        </li>
                        <li class="am-panel">
                            <a href="admin-404.html">
                                <i class="am-list-ico am-icon-bug am-margin-left-sm"></i> 404页面 </i>
                            </a>
                        </li>
                        <li class="am-panel">
                            <a href="login.html">
                                <i class="am-list-ico am-icon-key am-margin-left-sm"></i> 登陆</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- sidebar end -->

            @yield('content')
        </div>
        <a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    </body>
</html>