@extends('layout')



@section('content')
    <div class="row upperdiv">
        <div>
            <form action="/create/todo" method="post" class="form-inline my-2 my-lg-0">
                @csrf
                <input type="text" class="form-control input-lg mr-sm-2" name="todo" placeholder="Create a new todo">
                <button type="submit" class="btn btn-info my-2 my-sm-0">Create</button>
            </form>
        </div>
    </div>
    <hr>

    @foreach($todos as $todo)
        <table>
            <tr>
                <td>{{ $todo->todo }}</td>
                <td><a href="{{route('todo.delete', ['id' => $todo->id])}}" class="btn btn-danger" >X</a></td>
                <td><a href="{{route('todo.update', ['id' => $todo->id])}}" class="btn btn-primary" >update</a></td>
                <td>
                @if(!$todo->completed)

                    <a href="{{route('todo.completed', ['id' => $todo->id])}}" class="btn btn-xs btn-success">Mark As Completed</a>
                @else
                    <span class="text-success">Completed!</span>
                    <a href="{{route('todo.revert', ['id' => $todo->id])}}"><i class="fas fa-undo"></i></a>
                </td>
                @endif
            </tr>
        </table>
    @endforeach
@stop
