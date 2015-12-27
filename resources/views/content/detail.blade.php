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
                        <div>@include('content._selector')</div>
                        <div class="info">
                            <p>URL: <a href="{{ $content->url }}">{{ $content->url }}</a></p>
                            <p>Added by: {{ $content->user_id }}
                                - {{ $content->created_at->diffInMonths(\Carbon\Carbon::now()) >= 1 ? $content->created_at->format('j M Y') : $content->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="comments">
                            {{--@foreach($comments as $comment)--}}
                            {{--<div class="comment">--}}
                            {{--<p>{{ $comment->name }}</p>--}}
                            {{--<p>{{ $comment->created_at->diffInMonths(\Carbon\Carbon::now()) >= 1 ? $comment->created_at->format('j M Y') : $comment->created_at->diffForHumans() }}</p>--}}
                            {{--<p>{{ $comment->body }}</p>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
