@extends('layouts.master')

@section('title', 'Take Entry')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-4 pt-5">
                <div id="app">
                    <identifier-component action="/identify" method="post" csrf="{{ csrf_token() }}"></identifier-component>
                </div>
            </div>
        </div>
    </div>
@endsection