@extends('layout')



@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="/create/todo" method="post">
                @csrf
                <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">
            </form>
        </div>
    </div>
    <hr>

    @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{route('todo.delete', ['id' => $todo->id])}}" class="btn btn-danger" >X</a>

        <a href="{{route('todo.update', ['id' => $todo->id])}}" class="btn btn-primary" >update</a>
        @if(!$todo->completed)
        <a href="{{route('todo.completed', ['id' => $todo->id])}}" class="btn btn-xs btn-success">Mark As Completed</a>

        @else
            <span class="text-success">Completed!</span>
            <a href="{{route('todo.revert', ['id' => $todo->id])}}"><i class="fas fa-undo"></i></a>
        @endif
        <hr>
    @endforeach
@stop
