@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center m-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Adding Task</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('add.project.task.post', $project)}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter task name">
                                <span>This task will has the lowest priority you sure can move it to the top</span>
                            </div>
                            <button class="btn btn-primary" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
