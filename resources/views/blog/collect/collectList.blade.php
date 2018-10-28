@extends('blog.index.index')
@section('content')
    <div class="row">
        @include('blog.common.ajaxErrorSuccess')
        @include('blog.common.message')
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>文章标题</th>
                            <th>文章数据</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $val)
                            <tr>
                                <td><a href="/website/detail?id={{$val->id}}" target="_blank">{{$val->article_tille}}</a></td>
                                <td>
                                    <i class="fa fa-eye"></i> 阅读 - {{$val->look}}
                                    <i class="fa fa-commenting"></i> 评论 - {{$val->look}}
                                    <i class="fa fa-folder-o"></i> 收藏 - {{$val->collect_count}}
                                </td>
                                <td>{{$val->created_at}}</td>
                                <td>
                                    <a href="/blog/collect/remove?id={{$val->id}}" title="取消收藏" style="color: #0a0a0a">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$list->links()}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop