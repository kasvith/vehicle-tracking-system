<!-- jQuery 3 -->
<script src="{{ asset('_admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('_admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('_admin/js/adminlte.js') }}"></script>

<script src="{{ asset('_admin/plugins/iCheck/icheck.min.js') }}"></script>

<script src="{{ asset('_admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('_admin/bower_components/jquery-ui/jquery-ui.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.overlay').children('.callout').each(function (i, elem) {
            $(this).click(function () {
               $(this).fadeOut(300, function () {
                    $(this).remove();
               });
            });

            $(this).delay(2000).fadeOut((i+1)*2000, function () {
                $(this).remove()
            })
        })
    })
</script>

@yield('user-scripts')