@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

<div class="row">
    <div class="col-sm-12 text-center mb-4">
        <h1><span class="font-weight-bold">Section: </span>{{ $section->name }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Create Schedule</div>
            <div class="card-body">
                <form action="{{ route('sections.schedules.store', $section) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="subject_id">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_id">Room</label>
                        <select name="room_id" id="room_id" class="form-control">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="time_start">Start Time</label>
                        <input type="time" name="time_start" id="time_start" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="time_end">End Time</label>
                        <input type="time" name="time_end" id="time_end" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="day">Day</label>
                        <select name="day" id="day" class="form-control">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <h3>Schedules</h3>
        <table class="table table-bordered">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Day</th>
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
</div>
@endsection


    