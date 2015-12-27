@extends('layouts.app')

@section('title', 'Detail | PieterCMS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-title">{{ $content->title }}</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $content->title }}</div>
                    <div class="panel-body">
                        @include('content._selector')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
