
<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>VIS</b>admin</a>
    </div>

    @if(session('unauthorized'))
        @component('admin.partials.alert')
            @slot('id')
                danger-alert
            @endslot

            @slot('type')
                danger
            @endslot

            @slot('title')
                Permission Denied
            @endslot

            @slot('content')
                You are not authorized to view this
            @endslot
        @endcomponent
    @endif

    @if(isset($errors) && count($errors) > 0)
        @component('admin.partials.alert')
            @slot('id')
                danger-alert
            @endslot

            @slot('type')
                danger
            @endslot

            @slot('title')
                Permission Denied
            @endslot

            @slot('content')
                Credentials not match
        @endslot
    @endcomponent
@endif

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>

        <form action="/admin/login" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="nic" placeholder="NIC">
                <span class="fa fa-id-card form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input name="remember_me" type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="#">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
@include('admin.partials.scripts')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
