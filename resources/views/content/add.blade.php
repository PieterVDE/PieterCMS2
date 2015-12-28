@extends('layouts.app')

@section('title', 'Add content | PieterCMS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-title">Add new content</h1>
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-margin">Add new content</div>
                    <div class="panel-body">
                        <p>Have something interesting to share? Please do!</p>
                        <p class="margin-bottom">Complete the form below and your content will be shining on the front page in no time.</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/content/add') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">URL:</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="url" value=""
                                           placeholder="Paste or type the URL here">

                                    @if ($errors->has('url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-plus"></i>Add content
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
