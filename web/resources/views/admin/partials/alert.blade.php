<div class="alert alert-{{ $type }} alert-dismissible" id="{{ $id }}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @if(isset($title))
    <h4><i class="icon fa fa-ban"></i> {{ $title }} </h4>
    @endif
    {{ $content }}
</div>