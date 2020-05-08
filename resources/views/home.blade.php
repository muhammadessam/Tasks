@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body d-flex">
                        <div class="card col-6">
                            <div class="card-body">
                                <a style="width: 100%" class="btn btn-outline-primary" href="{{route('projects.index')}}">Go to Projects</a>
                            </div>
                        </div>
                        <div class="card col-6">
                            <div class="card-body">
                                <a style="width: 100%" class="btn btn-outline-primary" href="{{route('tasks.index')}}">Go to Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
