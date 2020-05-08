@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task</div>

                    <div class="card-body">
                        <table style="width: 100%;" id="tasks">
                            <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Priority</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->priority}}</td>
                                    <td class="d-flex">
                                        <a class="btn mr-2 btn-primary" href="{{route('tasks.edit', $task)}}"><i
                                                class="fa fa-edit"></i></a>
                                        <form method="post" id="deleteForm" action="{{route('tasks.destroy', $task)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit" onclick="deleteTaskConfirm()">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $('#tasks').DataTable();
        });

        function deleteTaskConfirm() {
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
                if (result.value) {
                    $("#deleteForm").submit();
                }
            })
        }
    </script>
@endsection
