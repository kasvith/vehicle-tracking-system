@extends('layouts.master')

@section('title', 'Take Entry')

@section('content')
    <div class="container pt-5 mt-5">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach

        @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-md-center">
            <div class="col-md-4 pt-5">
                <div id="app">
                    <identifier-component action="/identify" method="post" csrf="{{ csrf_token() }}"></identifier-component>
                </div>
            </div>
        </div>
    </div>
@endsection