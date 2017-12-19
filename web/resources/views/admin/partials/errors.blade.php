@component('admin.partials.alert')
    @slot('type')
        danger
    @endslot

    @slot('id') errors @endslot

    @slot('title')
        Validation errors
    @endslot

    @slot('content')
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endslot
@endcomponent