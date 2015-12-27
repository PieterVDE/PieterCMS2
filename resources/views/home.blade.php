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

                @foreach($content as $c)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $c->title }}</div>

                        <div class="panel-body">
                            @if($c->type == "YouTube")
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $c->body }}"
                                        frameborder="0" allowfullscreen></iframe>
                            @elseif($c->type == "Vimeo")
                                <iframe src="https://player.vimeo.com/video/{{ $c->body }}?badge=0" width="560"
                                        height="280" frameborder="0" allowfullscreen></iframe>
                            @elseif($c->type == "Soundcloud")
                                <iframe width="100%" height="166" scrolling="no" frameborder="no"
                                        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{ $c->body }}"></iframe>
                            @else
                                <img src="{{ $c->body }}" alt="Placeholder">
                            @endif
                        </div>
                    </div>
                    @if($c->id % 2 == 0)
                        <div class="clearfix visible-md-block"></div>
                    @elseif($c->id % 3 == 0)
                        <div class="clearfix visible-lg-block"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
