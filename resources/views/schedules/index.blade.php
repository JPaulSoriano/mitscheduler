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
            <div class="card-header">Add Schedule</div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Section:</label>
                                <select class="form-control" name="section_id">
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Subject:</label>
                                <select class="form-control" name="subject_id">
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Rooms:</label>
                                <select class="form-control" name="room_id">
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Start Time:</label>
                                <input type="time" name="time_start" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>End Time:</label>
                                <input type="time" name="time_end" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Day:</label>
                                <select class="form-control" name="day">
                                    <option value="MON">Monday</option>
                                    <option value="TUE">Tuesday</option>
                                    <option value="WED">Wednesday</option>
                                    <option value="THU">Thursday</option>
                                    <option value="FRI">Friday</option>
                                    <option value="SAT">Saturday</option>
                                    <option value="SUN">Sunday</option>
                                </select>
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
        {!! $schedules->links() !!}
    </div>
</div>
@endsection


    