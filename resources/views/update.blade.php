@extends('layout')



@section('content')

    <div class="row">
        <div class="col-lg-12 ">
            <form action="{{route('todo.save', ['id' => $todo->id])}}" method="post">
                @csrf
                <input type="text" class="form-control input-lg" name="todo" value="{{$todo->todo}}" placeholder="update a new todo">
                <button type="submit" class="btn btn-warning">Save</button>
            </form>
        </div>
    </div>
    <hr>
@stop
