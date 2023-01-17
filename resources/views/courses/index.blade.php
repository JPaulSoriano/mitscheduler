@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12 text-center mb-4">
            <h1><span class="font-weight-bold">Department: </span>{{ $department->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Add Course</div>
                <div class="card-body">
                    <form action="{{ route('departments.courses.store', $department)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <h3>Courses</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                </tr>
                @foreach ($department->courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection