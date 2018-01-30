@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new thread</div>

                <div class="panel-body">

                   <form action="/threads" method="POST" role="form">
                   {{ csrf_field() }}
                       <legend>Form title</legend>

                        <div class="form-group">
                            <select class="form-control" name="channel_id" id="channel_id" value="{{ old('channel_id') }}" required>
                                <option value="">Choose one...</option>
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? "selected" : ""}}>{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}" required>
                        </div>
                            <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class="form-control" id="body" placeholder="Body" required>{{ old('body') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>

                        @if(count($errors))
                            <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                        @endif
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
