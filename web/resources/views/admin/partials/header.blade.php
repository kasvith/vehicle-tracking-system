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
                        <img src="{{ asset(auth()->user()->image) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset(auth()->user()->image) }}" class="img-circle" alt="User Image">
                            <p>
                                {{ auth()->user()->name }}
                                <small>Member since {{ auth()->user()->created_at->format('F') }}, {{ auth()->user()->created_at->year }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.users.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{ route('admin.logout') }}" method="post">
                                    {{ csrf_field() }}
                                    <button class="btn btn-default btn-flat">Sign out</button>
                                </form>

                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{{ route('admin.users.settings') }}"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>