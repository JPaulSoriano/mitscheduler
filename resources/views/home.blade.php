@extends('layouts.app')

@section('content')
@role("Teacher")
<div class="row">
<div class="col-sm-12">
        <h3>My Schedules</h3>
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
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 14.28%">Sun</th>
                        <th style="width: 14.28%">Mon</th>
                        <th style="width: 14.28%">Tue</th>
                        <th style="width: 14.28%">Wed</th>
                        <th style="width: 14.28%">Thu</th>
                        <th style="width: 14.28%">Fri</th>
                        <th style="width: 14.28%">Sat</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td>
                            @foreach ($sunday as $sun)
                                <div class="alert alert-primary">
                                    {{ $sun->section->name }}<br>
                                    {{ $sun->subject->name }}<br>
                                    {{ $sun->room->name }}<br>
                                    {{ $sun->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($monday as $mon)
                                <div class="alert alert-primary text-center">
                                    {{ $mon->section->name }}<br>
                                    {{ $mon->subject->name }}<br>
                                    {{ $mon->room->name }}<br>
                                    {{ $mon->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($tuesday as $tue)
                                <div class="alert alert-primary text-center">
                                    {{ $tue->section->name }}<br>
                                    {{ $tue->subject->name }}<br>
                                    {{ $tue->room->name }}<br>
                                    {{ $tue->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($wednesday as $wed)
                                <div class="alert alert-primary text-center">
                                    {{ $wed->section->name }}<br>
                                    {{ $wed->subject->name }}<br>
                                    {{ $wed->room->name }}<br>
                                    {{ $wed->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($thursday as $thu)
                                <div class="alert alert-primary text-center">
                                    {{ $thu->section->name }}<br>
                                    {{ $thu->subject->name }}<br>
                                    {{ $thu->room->name }}<br>
                                    {{ $thu->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($friday as $fri)
                                <div class="alert alert-primary text-center">
                                    {{ $fri->section->name }}<br>
                                    {{ $fri->subject->name }}<br>
                                    {{ $fri->room->name }}<br>
                                    {{ $fri->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($saturday as $sat)
                                <div class="alert alert-primary text-center">
                                    {{ $sat->section->name }}<br>
                                    {{ $sat->subject->name }}<br>
                                    {{ $sat->room->name }}<br>
                                    {{ $sat->time_start }} - {{ $mon->time_end }}
                                </div>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
        </table>
    </div>
</div>
@endrole
@role("Admin")
<div class="col-sm-12">
    <h3>Admin</h3>
</div>
@endrole
@endsection
