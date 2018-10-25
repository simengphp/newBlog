<div class="header" id="header">
    <div class="header-bar">
        <i class="close"></i>
        <div class="wrapper">
            <p class="coll-desc">按<strong>Ctrl&nbsp;+&nbsp;D</strong>,将淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网放入收藏夹，优惠券信息一手掌握！</p>
        </div>
    </div>
    <div class="header-top">
        <div class="wrapper">
            <a href="/" class="logo-area">
                <img class="logo" alt="淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网" src="/tao/pc/static/logo.png">
            </a>
            <div class="slogan-area">
                <i class="slogan-icon cate-icon icon-haohuo"></i>
                <p>正品好货</p>
                <i class="slogan-icon cate-icon icon-jx"></i>
                <p>人工精选</p>
                <i class="slogan-icon cate-icon icon-fe4a49"></i>
                <p>内部领券</p>
                <i class="slogan-icon cate-icon icon-baoyou"></i>
                <p>全场包邮</p>
            </div>
            <div class="search-area">
                <form name="soForm" action="index.php/index/so/index.html" method="get" id="soform">

                    <!-- <select name="type" class="type-input-area">
                        <option value="0"  class='selected'>本站搜索</option>
                        <option value="1" >超级搜索</option>
                    </select> -->

                    <div class="select-area">
                        <div class="select-area-img"></div>
                        <div class="selected " data-id="0">本站 </div>
                        <div class="" data-id="1">全网 </div>
                    </div>
                    <input name="type" value="0" id="type" type="hidden">
                    <div class="input-area">
                        <i>
                        </i>

                        <input id="keyword" autocomplete="off" onblur="this.value==''?this.value=this.title:null" onfocus="this.value==this.title?this.value='':null" title="输入关键词或淘宝链接" placeholder="输入关键词" class="search-input" name="wd" type="text">

                    </div>
                    <a href="javascript:;" class="search-btn">搜索</a>
                </form>
            </div>
            <div id="suggest" class="suggest"></div>
        </div>
    </div>


    <div class="tab-area-plh">
        <div class="tab-area">
            <div class="wrapper">
                <div class="cate-area">
                    {{--<a class="cate-item jxtj active" href="http://tao.517zhe.com/">--}}
                        {{--<span class="cate-rec">精选推荐</span>--}}
                    {{--</a>--}}
                    @foreach($nav_list as $k=>$v)
                        <a class="cate-item {{$k==0?'jxtj active':''}}" href="{{$v->url}}">
                            <span class="cate-rec">{{$v->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>