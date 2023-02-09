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

<div class="row justify-content-end">
    <button type="button" class="btn btn-secondary btn-sm my-2" onclick="printJS('printJS-form', 'html')">
        Print
    </button>
</div>
<form id="printJS-form">
<div class="row">
    <h1><span class="font-weight-bold">Teacher: </span>{{ $teacher->full_name }}</h1>
</div>
<div class="row">
    <div class="col-sm-12">
        <h3>Schedules</h3>
        <table class="table table-bordered">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Day</th>
                <th>Time</th>
            </tr>
            @foreach ($myschedules as $schedule)
            <tr>
                <td>{{ $schedule->section->name }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->room->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->time_start }} - {{ $schedule->time_end }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</form>
@endsection