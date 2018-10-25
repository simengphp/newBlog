<div class="footer">
    <div class="footer-top">
        <div class="wrapper">
            <div class="yl">
                <p style="padding-top: 8px;" class="head">友情链接:</p>
                <div class="yl-links">
                    @foreach($friend_link as $k => $v)
                    <a href="{{$v->value}}" target="_blank">{{$v->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="logo-slogan">
                <div class="qr-code">
                    <a title="淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网" href="/">
                        <img alt="淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网" src="/tao/pc/static/concat.png">
                    </a>
                </div>
                <div class="txt">
                    <div class="logo">淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网</div>
                    <p class="s1">聪明的人，都会省钱</p>
                    <p class="s2">购物省钱神器</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bootom">
        <div class="wrapper">
            <p>淘券网-淘宝天猫比价优惠券白菜秒杀特价红包返利网  <a href="http://www.miitbeian.gov.cn/" target="_blank"></a>　　Copyright @2016-{{ date('Y') }} 淘券网 tao.simengphp.cn  All Rights Reserved</p>
        </div>
    </div>
</div>