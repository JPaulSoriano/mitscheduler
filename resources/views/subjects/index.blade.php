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
            <h1><span class="font-weight-bold">Course: </span>{{ $curriculum->course->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Add Subject</div>
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
                                    <label>Specialization:</label>
                                    <select class="form-control" name="specialization_id">
                                        @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
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
                                    <label>Lec Units:</label>
                                    <input type="text" name="lec" class="form-control unit" placeholder="Lec" value="0" onblur="findTotal()">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Lab Units:</label>
                                    <input type="number" name="lab" class="form-control unit" placeholder="Lab" value="0" onblur="findTotal()">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Total Units:</label>
                                    <input type="number" name="units" class="form-control" placeholder="Units" value="0" id="total" readonly>
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
            <h3>Subjects</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Period</th>
                    <th>Specialization</th>
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
                    <td>{{ $subject->specialization->name }}</td>
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
@section('script')
<script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByClassName('unit');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}

</script>
@endsection