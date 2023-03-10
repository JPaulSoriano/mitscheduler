@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

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

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Add Section</div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control" name="course_id">
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                    <option value="5th Year">5th Year</option>
                                </select>
                            </div>
                        </div>
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
    <h3>Sections</h3>
    <table class="table table-bordered">
        <tr>
            <th>Course</th>
            <th>Level</th>
            <th>Name</th>
            <th>A.Y</th>
            <th>Action</th>
        </tr>
	    @foreach ($sections as $section)
	    <tr>
	        <td>{{ $section->course->name }}</td>
            <td>{{ $section->level }}</td>
            <td>{{ $section->name }}</td>
            <td>{{ $section->academic_year }}</td>
            <td><a class="btn btn-sm btn-primary" href="{{ route('sections.schedules.index', $section) }}">Schedules</a></td>
	    </tr>
	    @endforeach
    </table>
    </div>
</div>

@endsection