<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('admin') }}"><i class="menu-icon fa fa-laptop"></i>Trang chủ </a>
                </li>
                <li class="menu-title">Tin tức</li><!-- /.menu-title -->
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                        <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                    </ul>
                </li> --}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Danh mục</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ route('category.index') }}">Quản lý danh mục</a></li>
                        <li><i class="fa fa-table"></i><a href="{{ route('category.create') }}">Thêm danh mục</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Bài viết</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{ route('tin.index') }}">Quản lý bài viết</a>
                        </li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{ route('tin.create') }}">Thêm bài viết</a></li>
                    </ul>
                </li>

                <li class="menu-title">Tài khoản</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon ti-email"></i>Tài khoản</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-group"></i><a href="{{ route('user.index') }}">Quản lý tài
                                khoản</a></li>
                        <li><i class="menu-icon fa fa-group"></i><a href="{{ route('user.create') }}">Thêm tài khoản</a>
                        </li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="">Peity Chart</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="menu-title">Bình luận</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Bình luận</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-comment"></i><a href="{{ route('comment.index') }}">Quản lý bình
                                luận</a></li>
                        <li><i class="menu-icon fa fa-comment"></i><a href="{{ route('comment.create') }}">Thêm bình
                                luận</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
