@extends('layouts.app')

@section('title', 'Home | PieterCMS')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('flash_message') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        <p>Your Application's Landing Page.</p>
                        <p>Login to access all functionality!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection