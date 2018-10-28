<!-- 底部内容start -->
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                友情链接：
                @foreach($friend_link as $k=>$v)
                    <a href="{{$v->value}}" target="_blank">{{$v->name}}&nbsp;</a>
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
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?e039613c7417df0cb32b034091854a91";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
