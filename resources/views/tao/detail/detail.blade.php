@include('tao.common.header')
<body>
@include('tao.common.top')
<div class="wrapper zk-detail">
    <div class="wrapper-l zk-main">
        <p class="bread-area" _hover-ignore="1">
            您的位置：<a href="/">淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网</a> &nbsp;&gt;&nbsp;
            <a href="http://tao.517zhe.com/index.php/index/cate/index/id/2.html">{{$goods_detail->class_name}}</a>
            &nbsp;&gt;&nbsp;{{$goods_detail->title}}        </p>
        <div class="zk-content">
            <div class="img-area">
                <img src="/uploads/{{$goods_detail->pic}}" alt="{{$goods_detail->title}}">
            </div>
            <div class="info-area">
                <h1 class="title elli">
                    <span>{{$goods_detail->postcode?'包邮':"不包邮"}}</span>{{$goods_detail->title}}                </h1>
                <p class="endtime" id="eventTimeStr"></p>
                <input id="endTime" value="{{$goods_detail->end_time}}" type="hidden">
                <script type="text/javascript">
                    $(function(){
                        var timeArea = $('#eventTimeStr');
                        var endTime = $('#endTime').val();
                        setInterval(dateCountDown,1000);
                        function dateCountDown(){
                            var now = Math.floor(new Date().getTime()/1000)*1;
                            if(now > endTime){
                                timeArea.html('优惠券已失效');
                            }else{
                                var gap = endTime - now;
                                var dd = Math.floor(gap/(60*60*24));
                                var hh = Math.floor((gap-dd*60*60*24)/(60*60));
                                var mm = Math.floor((gap-dd*60*60*24-hh*60*60)/60);
                                var ss = gap-dd*60*60*24-hh*60*60-mm*60;
                                var timeStr = '优惠券即将失效:&nbsp;'
                                    +(dd>0?'<em>'+dd+'</em>天':'')
                                    +(hh>0?'<em>'+hh+'</em>时':'')
                                    +(mm>0?'<em>'+mm+'</em>分':'')
                                    +(ss>=0?'<em>'+ss+'</em>秒':'');
                                timeArea.html(timeStr);
                            }
                        }
                    });
                </script>

                <div class="platform">
                    <i style="background-image: url(/tao/pc/static/platform_taobao.png);"></i>
                    淘宝
                </div>
                <div class="stat">
                    <p class="price-area">
                        <span class="ori-price">现价：{{$goods_detail->old_price}}</span>
                        <span class="price"><i>券后价</i><em class="decimal">¥</em><em class="int">{{$goods_detail->new_price}}</em></span>
                    </p>
                    <div class="buy-area">
                        <p class="desc">有效期内领券下单，享受立减优惠！</p>
                        <a href="http://tao.517zhe.com/index.php/index/click/index/id/560506633266/coupon_id/e1e08b45fde6429a88e7bd140723efee.html" target="_blank" rel="nofollow" class="buy-btn">
                            <div class="line line-l"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="line line-r"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
                            领券立减<em>{{$goods_detail->ticket}}</em>元
                        </a>
                    </div>
                </div>

                <div class="tags">
                    <div class="tag-list">
                        @foreach($goods_detail->key as $k => $v)
                        <a class="tag-item" href="">
                            {{$v}}
                        </a>
                        @endforeach
                    </div>
                    <p class="coll"><i></i>按<em>Ctrl&nbsp;+&nbsp;D</em>加入收藏</p>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-r" _hover-ignore="1">
        <div class="rel-zk-area" style="margin-top: 60px;">
            <p class="head">
                <span>最近浏览</span>
                <a href="http://tao.517zhe.com/index.php/index/history/index.html" class="more-his">查看更多
                </a>
            </p>
            <div class="hot-zk-list clearfix swiper-container swiper-container-horizontal">
                <div style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);" class="swiper-wrapper">
                    <div style="width: 262px;" class="swiper-slide swiper-slide-active">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="rel-zk-area" style="margin-bottom: 30px;">
        <p class="head"><span>猜你喜欢</span></p>
        <div class="rel-zk-list clearfix">
            @if (count($goods_list) == 0)
                <div align="center">
                    <img src="/uploads/empty.png" alt="暂无数据">
                </div>
            @else
                @foreach($goods_list as $k => $v)
                    <div class="zk-item">
                        <div class="img-area">
                            <span class="goods-new">新品</span>
                            <div class="lq">
                                <a href="#" target="_blank" rel="nofollow">
                                    <div class="lq-t">
                                        <p class="lq-t-d1">领优惠券</p>
                                        <p class="lq-t-d2">省<span>{{$v->ticket}}</span>元</p>
                                    </div>
                                    <div class="lq-b"></div>
                                </a>
                            </div>

                            <div class="bottom-info">
                                <p class="time-count" data-endtime="{{$v->end_time}}"><i class="cate-icon"></i></p>
                            </div>
                            <a href="/tao/detail?g_id={{$v->id}}" target="_blank" title="{{$v->title}}">
                                <img alt="{{$v->title}}"
                                     class="lazy" src="/uploads/{{$v->pic}}" style="opacity: 1;">
                            </a>
                        </div>
                        <p class="title-area elli">
                <span class="post-free">
                    {{$v->postcode?'包邮':'不包邮'}}
                </span>
                            {{$v->title}}
                        </p>
                        <div class="raw-price-area">原价：¥{{$v->old_price}}<p class="sold">已领 {{$v->ticket_num}} 张券</p></div>
                        <div class="info">
                            <div class="price-area">
                    <span class="price">
                        现价：¥
                        <em class="number-font" style="font-size: 18px;">
                            {{$v->new_price}}
                        </em>
                        <i></i>
                    </span>
                            </div>
                            <div class="buy-area">
                                <a href="" target="_blank" rel="nofollow">
                        <span class="coupon-amount">
                                        去淘宝
                        </span>
                                    <span class="btn-title">火速领券</span>
                                </a>
                            </div>
                            <div class="platform-area">
                                <img src="{{ asset('./tao/pc/static/platform_taobao.png') }}">淘宝
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    //头部搜索框js:
    $('.select-area div').not( $(".select-area-img") ).click(function(){
        var a = $(this).attr("data-id");
        $('#type').val(a);
        $(this).addClass("selected").siblings().removeClass("selected");

    })
</script>
@include('tao.common.footer')
@include('tao.common.return')
<div style="display:none">
</div>

</body></html>