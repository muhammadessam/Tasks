@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center m-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Adding Project</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('tasks.update', $task)}}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}">
                            </div>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
