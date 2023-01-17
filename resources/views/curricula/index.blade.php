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
                <div class="card-header">Add Curriculum</div>
                <div class="card-body">
                    <form action="{{ route('curricula.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Year:</label>
                                    <input type="text" name="year" class="form-control" placeholder="Year">
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
                    <th>No</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
                @foreach ($curricula as $curriculum)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $curriculum->name }}</td>
                    <td>{{ $curriculum->year }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('curricula.subjects.index', $curriculum) }}">Manage Subjects</a></td>
                </tr>
                @endforeach
            </table>
            {!! $curricula->links() !!}
        </div>
    </div>
@endsection