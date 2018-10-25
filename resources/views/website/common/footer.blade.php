<!-- 底部内容start -->
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                友情链接：
                @foreach($friend_link as $k=>$v)
                    <a href="{{$v->value}}">{{$v->name}}&nbsp;</a>
                @endforeach
            </div>
            <div class="col-md-4">
                备案信息：{{$config->website_code}}
            </div>
        </div>
    </div>
    <div style='padding-top:40px'></div>
    <div class="container">
        <div class="row" align='center'>
            Copyright Right © 2005-{{date('y')}} www.simengphp.cn Powered By SIMENGPHP {{$config->website_code}}
        </div>
    </div>
</footer>