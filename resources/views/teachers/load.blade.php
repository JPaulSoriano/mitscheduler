@extends('layouts.app')
@section('content')
<div class="row">
<h3>Teachers</h3>
    <table class="table table-bordered">
        <tr>
            <th>Teacher</th>
            <th>Total Units</th>
            <th>Load Schedules</th>
            <th>View Schedules</th>
        </tr>
	    @foreach ($teachers as $teacher)
	    <tr>
	        <td>{{ $teacher->full_name }}</td>
            <td>{{ $teacher->totalUnits() }}</td>
            <td><a class="btn btn-sm btn-primary" href="{{ route('teachers.schedules.assign', $teacher) }}">Load</a></td>
            <td><a class="btn btn-sm btn-primary" href="{{ route('viewschedules', $teacher) }}">View</a></td>
	    </tr>
	    @endforeach
    </table>
</div>
@endsection