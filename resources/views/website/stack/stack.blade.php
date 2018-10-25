@include('website.common.header')
<body>
@include('website.common.top')
<div class="container container-page">
    <div class="view" style="background: #fff;">
        <!-- 博客列表 -->
        <div class="panel panel-default" style="margin-bottom: 0;">
            <div class="panel-heading text-right sort">
                <a><strong>排序：</strong></a>
                <a href="/">默认</a>
                <a href="?class_id={{request()->get('class_id')}}&update=1">按更新时间</a>
                <a href="?class_id={{request()->get('class_id')}}&read_num=1">按访问量</a>
            </div>
            <div class="panel-body article-list-group">
                @if (count($stack_list) == 0)
                    <div align="center" style="width: 100%">
                        暂无数据！
                    </div>
                @else
                    @foreach($stack_list as $k => $v)
                        <dl class="article-list">
                            <dt class="article-list-title">
                                <a href="/website/detail?id={{$v->id}}">
                                    {{$v->name}}
                                </a>
                            </dt>
                            <dd class="article-list-footer">
                                <div class="info text-left">
                                    <span>{{date('Y-m-d H:i:s',$v->created_at)}}</span>
                                    <span>阅读数：<span>{{$v->name}}</span></span>
                                </div>
                            </dd>
                        </dl>
                    @endforeach
                @endif
            </div>
            <!-- 分页 -->
            <div class="page">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{$stack_list->render()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('website.common.right')
</div>
@include('website.common.footer')
</body>
</html>