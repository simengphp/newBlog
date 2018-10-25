@include('tao.common.header')
<body>
@include('tao.common.top')
<div class="cate-box">
    <div class="tab-area fixed">
        <div class="wrapper hori-cate-area">
            <div class="cate-l-1">
                <div class="wrapper">
                    <a href="/tao/goods" class=""><i class="cate-icon"></i> 全部分类</a>
                    @foreach($class_list as $k => $v)
                    <a class="" href="/tao/goods?class_id={{$v->id}}">
                       <i class="iconfont {{$v->icon}}"></i> {{$v->class_name}}
                    </a>
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
            if(_top >= 180){
                $('.tab-area').addClass('fixed');
            }else{
                $('.tab-area').removeClass('fixed');
            }
        });

    });
</script>
<div class="wrapper home-wrapper">
    <div id="couponList" class="zk-list clearfix">
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
            var ajaxUrl = "/index.php/index/ajax_request/suggest.html",
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
                                window.location.href= "/index.php/index/so/index.html" + "?wd=" + q;

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


    //头部搜索框js:
    $('.select-area div').not( $(".select-area-img") ).click(function(){
        var a = $(this).attr("data-id");
        $('#type').val(a);
        $(this).addClass("selected").siblings().removeClass("selected");

    })
</script>

@include('tao.common.return')

<div style="display:none">
</div>
</body></html>