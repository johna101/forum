@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ $thread->creator->path()}}">{{$thread->creator->name}}</a>
                    posted {{ $thread->title }}
                </div>

                <div class="panel-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
    @auth
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ $thread->path() . '/replies'}} " method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="body" rows="5" class="form-control" placeholder="Have something to say?"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>
    </div> 
    <br>
    @else
      <div class="header text-center"><a href="/login">Login</a> to reply...</div>   
      <br>
    @endauth
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>    
</div>
@endsection
