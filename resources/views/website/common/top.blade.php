<!-- 头部导航start -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
            <img src="/uploads/logo.jpg" alt="" style="width:30px;height: 30px">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach($class_list as $k => $v)
                <li class="">
                    <a href="/website/list?class_id={{$v->id}}">{{$v->class_name}}</a>
                </li>
                @endforeach
            </ul>
            <form class="navbar-form navbar-right" action="" method="get">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" class="form-control"
                          value="{{request()->get( 'title' )}}" placeholder="输入文章标题搜索">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
                <a href="/blog/manager/index">
                    <button type="button" class="btn btn-success">写文章</button>
                </a>
            </form>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- 头部导航end -->