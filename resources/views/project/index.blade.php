@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{route('projects.create')}}">Add Project <span
                class="fa fa-plus-circle"></span></a>

        <div class="row justify-content-start m-2">
            @foreach($projects as $project)
                <div class="col-4">
                    <div class="card m-1">
                        <div class="card-header d-flex justify-content-between">
                            <a class="btn btn-outline-dark" href="{{route('projects.show',$project)}}"><h3 class="d-inline">{{$project->name}}</h3></a>
                            <form class="form-inline d-inline" method="post"
                                  action="{{route('projects.destroy', $project)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return myFunction();" type="submit"><i
                                        class="fa fa-minus"></i></button>
                            </form>
                        </div>
                        <div class="card-body text-justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting,
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function myFunction() {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    $('.form-inline').submit();
                }
            });
        }
    </script>
@endsection
