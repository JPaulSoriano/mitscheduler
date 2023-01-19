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
            <h1><span class="font-weight-bold">Faculty: </span>{{ $user->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3>Schedules</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Room</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Day</th>
                    <th>Assign</th>
                </tr>
                @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->section->name }}</td>
                    <td>{{ $schedule->subject->name }}</td>
                    <td>{{ $schedule->room->name }}</td>
                    <td>{{ $schedule->time_start }}</td>
                    <td>{{ $schedule->time_end }}</td>
                    <td>{{ $schedule->day }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-sm-6">
          <h3>Assigned</h3>
        </div>
    </div>
@endsection