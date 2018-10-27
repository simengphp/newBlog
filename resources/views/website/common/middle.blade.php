<!-- 中间内容部分start -->
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
                @if (count($article_list) == 0)
                    <div align="center" style="width: 100%">
                        暂无数据！
                    </div>
                @else
                @foreach($article_list as $k => $v)
                <dl class="article-list">
                    <dt class="article-list-title">
                        <a href="/website/detail?id={{$v->id}}">
                            {{$v->title}}
                            @if ($v->look < 100)
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            @elseif ($v->look > 100 and $v->look < 500)
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            @elseif ($v->look > 500 and $v->look < 1000)
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            @else
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            <span style="color: red;font-size:5px" title="星级数根据阅读量以及文章质量自动处理"><i class="glyphicon glyphicon-star"></i></span>
                            @endif
                        </a>
                    </dt>
                    <dd class="article-list-footer">
                        <div class="heart info text-left">
                            <span>{{date('Y-m-d H:i:s',$v->created_at)}}</span>
                            <span>阅读数：<span>{{$v->look}}</span></span>
                            @if ($v->is_collect)
                                <span style="color: red" title="点击取消收藏你喜欢的文章，在个人中心处查看">
                                    <i class="collect glyphicon glyphicon-heart" data-token="{{csrf_token()}}" data-id="{{$v->id}}"></i></span>
                                @else
                                <span style="color: red" title="点击收藏你喜欢的文章，在个人中心处查看">
                                    <i data-token="{{csrf_token()}}" data-id="{{$v->id}}" class="collect glyphicon glyphicon-heart-empty"></i></span>
                            @endif
                        </div>
                    </dd>
                    <dd class="article-list-footer" style="padding-top: 15px">
                        <div class="info text-left">
                            {!!$v->desc!!}
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
                        {{$article_list->render()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('website.common.right')
</div>