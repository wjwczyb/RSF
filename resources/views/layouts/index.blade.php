<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!--360 browser -->
    <meta name="renderer" content="webkit">
    <meta name="author" content="wos">
    <!-- Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{asset('MengUI/i/app.png')}}">
    <!--Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('MengUI/i/app.png')}}">
    <!--Win8 or 10 -->
    <meta name="msapplication-TileImage" content="{{asset('MengUI/i/app.png')}}">
    <meta name="msapplication-TileColor" content="#e1652f">

    <link rel="icon" type="image/png" href="{{asset('MengUI/i/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('MengUI/assets/css/amazeui.css')}}">
    <link rel="stylesheet" href="{{asset('MengUI/css/public.css')}}">

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="{{asset('MengUI/assets/js/jquery.min.js')}}"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script src="{{asset('MengUI/assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('MengUI/js/public.js')}}"></script>
</head>
<body>

<header class="am-topbar am-topbar-fixed-top wos-header">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="#"><img src="{{asset('AmazeUI/i/logo.png')}}" alt=""></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-warning am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-active"><a href="#">首页</a></li>
                <!-- <li><a href="zixun.html">信用卡推荐</a></li> -->
                <!-- <li><a href="category.html">专栏</a></li> -->
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        本地优惠信息 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li class="am-dropdown-header">优惠</li>
                        <li><a href="#">1. 餐饮</a></li>
                        <li><a href="#">2. 电影</a></li>
                        <!-- <li><a href="#">3. 其他</a></li> -->
                        <!-- <li><a href="cases.html">4. 全部案例</a></li> -->
                    </ul>
                </li>
                <li><a href="profile.html">信用卡推荐</a></li>
                <li><a href="events.html">教育优惠</a></li>
            </ul>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注册</button>
            </div>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-danger am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button>
            </div>
        </div>
    </div>
</header>












@yield('content')



<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>

















<footer>
    <div class="content">
        <ul class="am-avg-sm-5 am-avg-md-5 am-avg-lg-5 am-thumbnails">
            <li><a href="#" disable>联系我们</a></li>
            <li><a href="#" disable>加入我们</a></li>
            <li><a href="#" disable>合作伙伴</a></li>
            <li><a href="#" disable>广告及服务</a></li>
            <li><a href="#" disable>友情链接</a></li>
        </ul>
        <!-- <div class="btnlogo"><img src="{{asset('MengUI/images/btnlogo.png')}}"/></div> -->
        <!-- <p>Amaze UI出品<br>© 2016 AllMobilize, Inc. Licensed under MIT license. Developed with WebStorm.</p> -->
        <div class="w2div">
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-2 am-avg-lg-2 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
            <li class="w2">
                <div class="am-gallery-item">
                    <a href="{{asset('MengUI/Temp-images/cli_1000px.png')}}">
                        <img src="{{asset('MengUI/Temp-images/cli_1000px.png')}}" />
                        <h3 class="am-gallery-title">订阅号：测试</h3>
                    </a>
                </div>
            </li>
            <li   class="w2">
                <div class="am-gallery-item">
                    <a href="{{asset('MengUI/Temp-images/cli_1000px.png')}}">
                        <img src="{{asset('MengUI/Temp-images/cli_1000px.png')}}"/>
                        <h3 class="am-gallery-title">服务号：测试</h3>
                    </a>
                </div>
            </li>
        </ul>
        <p>Amaze UI出品<br>© 2016 AllMobilize, Inc. Licensed under MIT license. Developed with WebStorm.</p>
        <p>RSFish 制作 © 2018</p>
        </div>
    </div>
</footer>


</body>
</html>