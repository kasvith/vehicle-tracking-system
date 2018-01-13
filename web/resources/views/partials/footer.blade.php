<footer class="mt-5">
    <hr>
    <div class="text-center">UOP 2018</div>
</footer>

<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=loadMap"></script>
<script src="/js/bootstrap-notify.min.js"></script>
<script>
    function loadMap(){
        window.app.initMaps()
    }
</script>
@yield('user-scripts')