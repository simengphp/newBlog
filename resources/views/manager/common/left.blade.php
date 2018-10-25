<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Session::get('admin_pic')?Session::get('admin_pic'):'/uploads/logo.jpg' }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Session::get('admin_name') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ Session::get('last_login_time') }}</a>
            </div>
        </div>
        {{--<!-- search form -->--}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">主菜单</li>
            <li class="treeview class article">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>文章管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/class/classList"><i class="fa fa-circle-o"></i>分类列表</a></li>
                    <li><a href="/article/articles"><i class="fa fa-circle-o"></i>文章列表</a></li>
                </ul>
            </li>
            <li class="treeview config">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>配置管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/config/config"><i class="fa fa-circle-o"></i>配置管理</a></li>
                </ul>
            </li>
            <li class="treeview stack">
                <a href="#">
                    <i class="fa fa-male"></i>
                    <span>贡献者管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/stack/stack"><i class="fa fa-circle-o"></i>贡献者</a></li>
                </ul>
            </li>
            <li class="treeview friend">
                <a href="#">
                    <i class="fa fa-user-plus"></i>
                    <span>友链管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/friend/friendList"><i class="fa fa-circle-o"></i>友链列表</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>