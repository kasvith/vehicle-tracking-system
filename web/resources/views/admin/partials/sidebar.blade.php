<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(auth()->user()->image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DASHBOARD</li>
            <li class="{{ active_route('admin.dash') }}"><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i><span>Home</span></a></li>

            <li class="header">USER MANAGEMENT</li>
            <li class="{{ active_route('admin.users') }} {{ active_route('admin.users.*') }}"><a href="{{ route('admin.users') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>

            <li class="header">VEHICLE MANAGEMENT</li>
            <li class="{{ active_route('admin.owners') }} {{ active_route('admin.owners.*') }}"><a href="{{ route('admin.owners') }}"><i class="fa fa-address-card-o"></i> <span>Owners</span></a></li>
            <li class="{{ active_route('admin.vehicles') }}"><a href="#"><i class="fa fa-automobile"></i> <span>Vehicles</span></a></li>

            <li class="header">MANAGE</li>
            <li class="{{ active_route('admin.users.settings') }}"><a href="{{ route('admin.users.settings') }}"><i class="fa fa-gear"></i> <span>Settings</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
