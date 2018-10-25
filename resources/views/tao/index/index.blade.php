@include('tao.common.header')
<body>
@include('tao.common.top')
<div class="cate-box">
    <div class="tab-area" style="display:none">
        <div class="wrapper hori-cate-area">
            <div class="cate-l-1">
                <div class="wrapper">
                    <a href="#" class=""><i class="cate-icon"></i> 今日新品</a>
                    @foreach($class_list as $k => $v)
                    <a href="/tao/goods?class_id={{$v->id}}" class="iconfont {{$v->icon}}"><i class="cate-icon"></i> {{$v->class_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        @include('tao.common.sort')
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('scroll',function(){
            var _top = $(document).scrollTop();
            if(_top >= 400){
                backToTop
                $('.cate-box .tab-area').show();
                $('.tab-area').addClass('fixed');
            }else{

                $('.tab-area').removeClass('fixed');
                $('.cate-box  .tab-area').hide();
            }
        });
    });
</script>
<div class="wrapper home-oper-area">
    <div class="cate-area">
        @foreach($class_list as $k => $v)
        <a class="cate-item" href="/tao/goods?class_id={{$v->id}}">
            <div class="inner">
                <i class="iconfont {{$v->icon}}"></i>  {{$v->class_name}}
            </div>
        </a>
        @endforeach
    </div>
    <!--广告轮播-->
    <div class="banner-top">
        <div class="banner-area swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1320px, 0px, 0px);">
                @foreach($pic_list as $k=>$v)
                    <div class="swiper-slide swiper-slide-prev" style="width: 660px;">
                        <a target="_blank" class="swiper-slide swiper-slide-duplicate" href="" style="width: 660px;">
                            <img style="width: 100%;" src="./uploads/{{$v->pic}}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-bottom">
                <div class="swiper-pager">
                </div>
            </div>
        </div>

        <div class="top-right-banner">
            <a href="http://tao.517zhe.com/index.php/index/index/index.html" target="_blank" title="轮播右侧">
                <img src="./uploads/{{$pic_right->pic}}" title="轮播右侧广告">
            </a>
        </div>

    </div>

    <div class="small-banner-area">
        @foreach($pic_bottom_list as $k=>$v)
        <div href="javascript:;" class="small-banner-item">
            <a target="_blank" href="http://tao.517zhe.com/index.php/index/index/index.html">
                <img src="./uploads/{{$v->pic}}">
                <p class="title">{{$v->alt}}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="wrapper home-wrapper">
    <div id="couponList" class="zk-list clearfix">
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
    </div>
    <div class="page">
        <ul class="pagination">
            {{$goods_list->links()}}
        </ul>
    </div>
</div>
@include('tao.common.footer')
<script type="text/javascript">
    ;$(function(){
        var sort = "";
        switch(sort)
        {
            case 'volume':
                $('.sort-type').find('.active').attr('data-sort','minVolume');
                $('.sort-type').find('.active i').toggleClass("sort_desc").html('');
                break;
            case 'minVolume':
                $('.sort-type').find('.active').attr('data-sort','volume');
                $('.sort-type').find('.active i').toggleClass("sort_asc").html('');
                break;
            case 'price':
                $('.sort-type').find('.active').attr('data-sort','minPrice');
                $('.sort-type').find('.active i').toggleClass("sort_asc").html('');
                break;
            case 'minPrice':
                $('.sort-type').find('.active').attr('data-sort','price');
                $('.sort-type').find('.active i').toggleClass("sort_desc").html('');
                break;
            case 'quan':
                $('.sort-type').find('.active').attr('data-sort','minQuan');
                $('.sort-type').find('.active i').toggleClass("sort_desc").html('');
                break;
            case 'minQuan':
                $('.sort-type').find('.active').attr('data-sort','quan');
                $('.sort-type').find('.active i').toggleClass("sort_asc").html('');
                break;
            case 'surplus':
                $('.sort-type').find('.active').attr('data-sort','receive');
                $('.sort-type').find('.active i').toggleClass("sort_desc").html('');
                break;
            case 'receive':
                $('.sort-type').find('.active').attr('data-sort','surplus');
                $('.sort-type').find('.active i').toggleClass("sort_asc").html('');
                break;


        }
        $('.sort-type li').each(function(){
            $(this).bind('click', function(){
                var sort = $(this).attr('data-sort');
                $('input[name=sort]').val($(this).attr('data-sort'));
                if($('.price-filter li').hasClass('active')){
                    $('input[name=price]').val($('.price-filter').find('.active').attr('data-price'));
                }
                document.filterForm.submit();
            });
        });

        $('.price-filter li').each(function(){
            $(this).bind('click', function(){
                $('input[name=price]').val($(this).attr('data-price'));
                if($('.sort-type li').hasClass('active')){
                    $('input[name=sort]').val($('.sort-type').find('.active').attr('data-sort'));
                }
                document.filterForm.submit();
            });
        });

        $('#keyword').bind('input propertychange', function() {
            var ajaxUrl = "index.php/index/ajax_request/suggest.html",
                keyword = $(this).val();
            $.getJSON(ajaxUrl,{keyword:keyword},function(result){
                if (result.code == 1) {
                    if (keyword) {
                        $('.suggest').addClass("dropdown");
                        $(".suggest").html(result.data);
                        $("#suggest ul li a").each(function() {
                            $(this).on('click', function(){
                                var  q = $(this).attr('data-keyword');
                                $('#keyword').val(q);
                                $('.suggest').removeClass("dropdown");
                                window.location.href= "index.php/index/so/index.html" + "?wd=" + q;

                            });

                        });
                    }
                }
            })
        });

        $("body").on('click',function() {
            $('.dropdown-menu').remove();
        });

        $('.search-btn').on('click',function(){
            document.soForm.submit();
        })

        $(document).on('scroll',function(){
            var _top = $(document).scrollTop();
            if(_top >= 400){
                $('#backToTop').show();
            }else{
                $('#backToTop').hide();
            }
        });

        $("#backToTop").click(function(){
            if ($('html').scrollTop()) {
                $('html').animate({ scrollTop: 0 }, 1000);
                return false;
            }
            $('body').animate({ scrollTop: 0 }, 1000);
            return false;
        });
    });
</script>
<script type="text/javascript" src="{{ asset('./tao/pc/static/swiper3.js') }}"></script>
<script type="text/javascript">
    $(function(){
        var sw = new Swiper('.banner-area',{
            autoplay: 3000,
            loop:true,
            pagination: '.swiper-pager'
        });

        //头部搜索框js:
        $('.select-area div').not( $(".select-area-img") ).click(function(){
            var a = $(this).attr("data-id");
            $('#type').val(a);
            $(this).addClass("selected").siblings().removeClass("selected");

        })
    });
</script>
@include('tao.common.return')

<div style="display:none">
</div>

</body>
</html>