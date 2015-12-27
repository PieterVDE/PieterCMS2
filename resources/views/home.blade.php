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
                <h1 class="page-title">Dashboard</h1>

                @foreach($contents as $content)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $content->title }}</div>

                        <div class="panel-body">
                            @include('content._selector')
                        </div>
                        <div class="panel-footer">
                            <a href="{{ url('/content', $content->id) }}" class="btn btn-primary">See more &raquo;</a>
                        </div>
                    </div>
                    @if($content->id % 2 == 0)
                        <div class="clearfix visible-md-block"></div>
                    @elseif($content->id % 3 == 0)
                        <div class="clearfix visible-lg-block"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
