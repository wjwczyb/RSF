@extends('layouts.index')




@section('content')
<!--banner-->
<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}' >
                <ul class="am-slides">
                    <li>
                        <a href="events_show.html"><img src="{{asset('MengUI/Temp-images/bb1.jpg')}}"></a>
                        <div class="am-slider-desc">远方 有一个地方 那里种有我们的梦想</div>

                    </li>
                    <li>
                        <a href="events_show.html"><img src="{{asset('MengUI/Temp-images/bb2.jpg')}}"></a>
                        <div class="am-slider-desc">某天 也许会相遇 相遇在这个好地方</div>

                    </li>
                    <li>
                        <a href="events_show.html"><img src="{{asset('MengUI/Temp-images/bb3.jpg')}}"></a>
                        <div class="am-slider-desc">不要太担心 只因为我相信 终会走过这条遥远的道路</div>

                    </li>
                    <li>
                        <a href="events_show.html"><img src="{{asset('MengUI/Temp-images/bb4.jpg')}}"></a>
                        <div class="am-slider-desc">OH PARA PARADISE 是否那么重要 你是否那么地遥远</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 padding-none">
            <div class="star am-container"><span class="recommend"><!-- <img src="{{asset('AmazeUI/i/logo.png')}}" > -->推荐</span></div>
            <ul class="padding-none am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-2 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <img src="{{asset('MengUI/Temp-images/lins.png')}}"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <img src="{{asset('MengUI/Temp-images/lins.png')}}"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <img src="{{asset('MengUI/Temp-images/lins.png')}}"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <img src="{{asset('MengUI/Temp-images/lins.png')}}"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--banner2-->
<!-- <div class="am-container">
    <ul class="padding-none banner2 am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
        <li>
            <div class="am-gallery-item">
                <a href="news.html">
                    <img src="{{asset('MengUI/Temp-images/tempnews.png')}}"  alt="远方 有一个地方 那里种有我们的梦想"/>
                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                    <div class="am-gallery-desc">2375-09-26</div>
                </a>
            </div>
        </li>

    </ul>
</div> -->
<!--news-->
<div class="am-g am-container newatype">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 oh">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
            <h2 class="am-titlebar-title ">
                热门优惠
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">更多 &raquo;</a>
            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">


            	@foreach ($promotions as $promotion)
				    
					<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://{{$promotion->prom_url}}">
                                <img src="/{{$promotion->prom_imgurl}}" alt="我最喜欢的一张画"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="#">{{$promotion->prom_name}}</a></h3>
                            <div class="am-list-item-text">{!! $promotion->prom_info !!}</div>
                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o">{{$promotion->created_at->format('Y-m-d')}}</i>
                        <i class="am-icon-hand-pointer-o">12322</i>
                    </div>

				@endforeach
                    


                   

                </ul>
            </div>
        
            <div class="am-hide-sm">
 

                <div id="yingxiao" class="case am-animation-slide-right dn">
                    <ul class="am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
                        <li>
                            <div class="am-gallery-item">
                                <a href="{{asset('MengUI/Temp-images/dd.jpg')}}">
                                    <img src="{{asset('MengUI/Temp-images/cc.jpg')}}" data-replace-img="{{asset('MengUI/Temp-images/dd.jpg')}}" alt="远方 有一个地方 那里种有我们的梦想"/>
                                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                    <div class="am-gallery-desc">2375-09-26</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="{{asset('MengUI/Temp-images/dd.jpg')}}">
                                    <img src="{{asset('MengUI/Temp-images/cc.jpg')}}" data-replace-img="{{asset('MengUI/Temp-images/dd.jpg')}}" alt="远方 有一个地方 那里种有我们的梦想"/>
                                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                    <div class="am-gallery-desc">2375-09-26</div>
                                </a>
                            </div>
                        </li>
                       
                        <li>
                            <div class="am-gallery-item">
                                <a href="{{asset('MengUI/Temp-images/dd.jpg')}}">
                                    <img src="{{asset('MengUI/Temp-images/cc.jpg')}}" data-replace-img="{{asset('MengUI/Temp-images/dd.jpg')}}" alt="远方 有一个地方 那里种有我们的梦想"/>
                                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                    <div class="am-gallery-desc">2375-09-26</div>
                                </a>
                            </div>
                        </li>
       
                    </ul>
                </div>


   
                           
            </div>
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
       
      

        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                合作专栏
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg" data-am-scrollspy="{animation:'fade'}">
            <ul class="am-list">
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="{{asset('MengUI/Temp-images/face.jpg')}}" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>
                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="{{asset('MengUI/Temp-images/face.jpg')}}" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="{{asset('MengUI/Temp-images/face.jpg')}}" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
            </ul>
        </div>
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                评测
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>


        <ul class="am-gallery am-avg-sm-1
  am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                        <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
 
        </ul>

    </div>
</div>

@endsection