<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>爱上猫的鱼灬 | Controller Panel</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vendors -->
    @include('admin.layout.head')
    @yield('css')
</head>

<body>
<!-- Page Loader -->
<div id="page-loader">
    <div class="preloader preloader--xl preloader--light">
        <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20"/>
        </svg>
    </div>
</div>

<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="{{ url('/admin/index') }}" class="hidden-xs">
            爱上猫的鱼灬
            <small>Gegewv</small>
        </a>
        <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
    </div>

    <ul class="top-menu">
        <li class="top-menu__alerts" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab"
            data-target="#notifications__messages">
            <a href=""><i class="zmdi zmdi-notifications"></i></a>
        </li>
        <li class="top-menu__profile dropdown">
            <a data-toggle="dropdown" href="">
                <img src="/admin/demo/img/profile-pics/1.jpg" alt="">
            </a>

            <ul class="dropdown-menu pull-right dropdown-menu--icon">
                <li>
                    <a href=""><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-time-restore"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>

</header>
<!--中间面板-->
<section id="main">
    <!--通知面板-->
    <aside id="notifications">
        <ul class="tab-nav tab-nav--justified tab-nav--icon">
            <li><a class="user-alert__messages" href="#notifications__messages" data-toggle="tab"><i
                            class="zmdi zmdi-email"></i></a></li>
            <li><a class="user-alert__notifications" href="#notifications__updates" data-toggle="tab"><i
                            class="zmdi zmdi-notifications"></i></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane" id="notifications__messages">
                <div class="list-group">
                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/admin/demo/img/profile-pics/1.jpg" alt="">
                        </div>

                        <div class="media-body">
                            <div class="list-group__heading">David Villa Jacobs</div>
                            <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Etiam mattis lobortis sapien non posuere
                            </small>
                        </div>
                    </a>
                </div>

                <a href="" class="btn btn--float">
                    <i class="zmdi zmdi-plus"></i>
                </a>
            </div>

            <div class="tab-pane" id="notifications__updates">
                <div class="list-group">
                    <a href="" class="list-group-item media">
                        <div class="pull-right">
                            <img class="avatar-img" src="/admin/demo/img/profile-pics/1.jpg" alt="">
                        </div>

                        <div class="media-body">
                            <div class="list-group__heading">David Villa Jacobs</div>
                            <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Etiam mattis lobortis sapien non posuere
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item">
                        <div class="list-group__heading">Candice Barnes</div>
                        <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus
                            curabitur.
                        </small>
                    </a>
                </div>
            </div>


        </div>
    </aside>
    <!--菜单面板-->
    <aside id="navigation">
        <div class="navigation__header">
            <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
        </div>

        <div class="navigation__toggles">
            <a href="" class="active" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab"
               data-target="#notifications__messages">
                <i class="zmdi zmdi-email"></i>
            </a>
            <a href="" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab"
               data-target="#notifications__updates">
                <i class="zmdi zmdi-notifications"></i>
            </a>
            <a href="{{ url('/admin/article/add') }}" >
                <i class="zmdi zmdi-format-playlist-add"></i>
            </a>
        </div>

        <div class="navigation__menu c-overflow">
            <ul>
                <li class="navigation">
                    <a href="{{ url('/admin/index') }}"><i class="zmdi zmdi-home"></i> 后台主页</a>
                </li>
                <li class="navigation__sub">
                    <a href="" data-mae-action="submenu-toggle"><i class="zmdi zmdi-view-list"></i> 文章管理</a>
                    <ul>
                        <li><a href="{{ url('/admin/article/index') }}"> 文章目录</a></li>
                        <li><a href="{{ url('/admin/article/add') }}"> 新建一篇</a></li>
                        <li><a href="{{ url('/admin/article/trash') }}"> 垃圾篓子</a></li>
                    </ul>
                </li>
                <li class="navigation__sub">
                    <a href="" data-mae-action="submenu-toggle"><i class="zmdi zmdi-comment"></i> 评论管理</a>
                    <ul>
                        <li><a href="{{ url('/admin/comment/index') }}"> 全部评论</a></li>
                        <li><a href="{{ url('/admin/comment/trash') }}"> 垃圾篓子</a></li>
                    </ul>
                </li>
                <li class="navigation__sub">
                    <a href=""><i class="zmdi zmdi-account"></i> 个人管理</a>
                    <ul>
                        <li><a href="{{ url('/admin/profile') }}"> 个人信息</a></li>
                        <li><a href="{{ url('/admin/social') }}"> Social Link</a></li>
                        <li><a href="{{ url('/admin/password/reset') }}"> 修改密码</a></li>
                    </ul>
                </li>
                <li class="navigation__sub">
                    <a href=""><i class="zmdi zmdi-settings"></i> 设置</a>
                    <ul>
                        <li><a href="{{ url('/admin/website') }}"> 网站设置</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <!--内容面板-->
    @yield('content')

    <footer id="footer">
        Copyright &copy; 2018
    </footer>

</section>

<!-- Javascript Libraries -->

@include('admin.layout.script')
@yield('script')
</body>
</html>
