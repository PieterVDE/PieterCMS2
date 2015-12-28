@extends('layouts.app')

@section('title', 'Detail | PieterCMS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-margin">{{ $content->title }}</div>
                    <div class="panel-body">
                        <div>@include('content._selector')</div>
                        <div class="info">
                            <p><a href="{{ $content->url }}">{{ $content->url }}</a></p>
                            <p>by <strong>{{ $uploader->name }}</strong>
                                - {{ $content->created_at->diffInMonths(\Carbon\Carbon::now()) >= 1 ? $content->created_at->format('j M Y') : $content->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="comments">
                            <h2>Comments</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/content', $content->id ) }}">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Add comment:</label>
                                    <div class="col-md-5">
                                        <input id="{{ $content->id  }}" name="content_id" type="hidden" value="{{ $content->id }}">
                                        <input type="text" class="form-control" name="comment" value="{{ old('comment') }}" placeholder="Your comment">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-plus"></i>Add comment
                                        </button>
                                    </div>
                                </div>
                            </form>

                            @foreach($comments as $comment)
                            <div class="comment">
                            <p><strong>{{ $comment->name ?: "Anonymous" }}</strong> - {{ $comment->created_at->diffInMonths(\Carbon\Carbon::now()) >= 1 ? $comment->created_at->format('j M Y') : $comment->created_at->diffForHumans() }}</p>
                            <p>{{ $comment->body }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
