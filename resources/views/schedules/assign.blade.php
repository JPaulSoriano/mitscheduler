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
<h1><span class="font-weight-bold">Username: </span>{{ $teacher->lastname }}</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <h3>All Available Schedules</h3>
        <table class="table table-bordered">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Day</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->section->name }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->room->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->time_start }} - {{ $schedule->time_end }}</td>
                <td>
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="teacher_id" class="form-control" value="{{$teacher->id}}">
                        <button type="submit" class="btn btn-sm btn-primary">Load</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Recommended Schedules</h3>
        <table class="table table-bordered">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Day</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            @foreach ($recoms as $recom)
            <tr>
                <td>{{ $recom->section->name }}</td>
                <td>{{ $recom->subject->name }}</td>
                <td>{{ $recom->room->name }}</td>
                <td>{{ $recom->day }}</td>
                <td>{{ $recom->time_start }} - {{ $recom->time_end }}</td>
                <td>
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="teacher_id" class="form-control" value="{{$teacher->id}}">
                        <button type="submit" class="btn btn-sm btn-primary">Load</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-sm-12">
        <h3>Assigned Schedules</h3>
        <table class="table table-bordered">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Day</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            @foreach ($myschedules as $schedule)
            <tr>
                <td>{{ $schedule->section->name }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->room->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->time_start }} - {{ $schedule->time_end }}</td>
                <td>
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="teacher_id" class="form-control" value="{{$teacher->id}}">
                        <button type="submit" class="btn btn-sm btn-danger">Deload</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection