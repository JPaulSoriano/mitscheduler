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
            <h1><span class="font-weight-bold">Username: </span>{{ $user->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form action="{{ route('users.teachers.store', $user)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Lastname:</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="@if(!empty($user->teacher->lastname)) {{ $user->teacher->lastname }} @endif">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Firstname:</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="@if(!empty($user->teacher->firstname)) {{ $user->teacher->firstname }} @endif">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>MI:</label>
                                    <input type="text" name="mi" class="form-control" placeholder="MI" value="@if(!empty($user->teacher->mi)) {{ $user->teacher->mi }} @endif">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="@if(!empty($user->teacher->address)) {{ $user->teacher->address }} @endif">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Contac No:</label>
                                        <input type="text" name="contactno" class="form-control" placeholder="Contact No" value="@if(!empty($user->teacher->contactno)) {{ $user->teacher->contactno }} @endif">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <select class="form-control" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Department:</label>
                                    <select class="form-control" name="department_id">
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Specialization:</label>
                                    <select class="form-control" name="specialization_id">
                                        @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
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
    </div>
@endsection