<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>V</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>VIS</b> admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <img src="{{ asset('_admin/img/avatar5.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset('_admin/img/avatar5.png') }}" class="img-circle" alt="User Image">
                            <p>
                                User Name here
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/admin/profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/admin/signout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>