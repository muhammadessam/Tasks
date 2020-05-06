@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-8">
                <a href="{{route('add.project.task.get', $project)}}" class="btn btn-primary">Add Task</a>
            </div>
        </div>
    </div>
    <project-tasks :project="{{$project}}"></project-tasks>
@endsection
@section('javascript')
@endsection
