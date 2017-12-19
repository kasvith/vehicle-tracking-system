@if(session('callout'))
    <div>
        <div class="overlay col-md-4">
            <div class="callout callout-{{ session('callout-type') }} ">
                <h4>{{ session('callout-title') }}</h4>

                <p>{!! session('callout') !!}</p>
            </div>
        </div>
    </div>
@endif