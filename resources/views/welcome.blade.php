@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'tasks.store']) !!}
                        <div class="form-group">
                            {!! Form::label('status', 'ステータス:') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'タスク:') !!}
                            {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif      
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif    
            </div>
        </div>
    @else    
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the tasklists</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection    