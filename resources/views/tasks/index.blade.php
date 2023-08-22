@extends('layouts.app')

@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tasks</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('create') }}"> Create Task</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>T.No</th>
            <th>Task Title</th>
            <th>Task Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <form action="{{ route('destroy',$task->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('edit',$task->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @else
        <tr>
            <td class="text-center" colspan="4">No Tasks Yet!!</td>
        </tr>
        @endif
        </tbody>
    </table>
    {!! $tasks->links() !!}
</div>
@endsection
