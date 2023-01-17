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
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Add Room</div>
                <div class="card-body">
                    <form action="{{ route('curricula.subjects.store', $curriculum)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Period</label>
                                    <select class="form-control" name="period">
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                        <option value="Summer">Summer</option>
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
                                    <label>Code:</label>
                                    <input type="text" name="code" class="form-control" placeholder="Code">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Lec:</label>
                                    <input type="text" name="lec" class="form-control" placeholder="Lec">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Lab:</label>
                                    <input type="text" name="lab" class="form-control" placeholder="Lab">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Units:</label>
                                    <input type="text" name="units" class="form-control" placeholder="Units">
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
            <table class="table table-bordered">
                <tr>
                    <th>Period</th>
                    <th>Level</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Lecture</th>
                    <th>Lab</th>
                    <th>Units</th>
                </tr>
                @foreach ($curriculum->subjects as $subject)
                <tr>
                    <td>{{ $subject->period }}</td>
                    <td>{{ $subject->level }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->lec }}</td>
                    <td>{{ $subject->lab }}</td>
                    <td>{{ $subject->units }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection