@include('website.common.header')
<body>
@include('website.common.top')
<!-- 中间内容部分start -->
<div class="container container-page" style="margin-bottom:50px;">
    <div class="view" style="background: #fff;">
        <div class="page-header">
            <dl>
                <dt class="title"><h3>{{$article_detail->title}}</h3></dt>
                <dd>
                    <span>{{$article_detail->created_at}}</span><br>
                    <span>阅读数:{{$article_detail->look}}</span>
                </dd>
            </dl>
        </div>
        <div id="test-editormd" class="editormd editormd-vertical" style="width:100%;height:auto;">
            {!!$article_detail->content!!}
        </div>
    </div>
    @include('website.common.right')
</div>
<!-- 中间内容部分end -->
@include('website.common.footer')
</body>
</html>