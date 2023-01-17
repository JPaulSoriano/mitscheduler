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
                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>No:</label>
                                    <input type="text" name="no" class="form-control" placeholder="No">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Building:</label>
                                    <input type="text" name="building" class="form-control" placeholder="Building">
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
                    <th>No</th>
                    <th>Building</th>
                </tr>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $room->no }}</td>
                    <td>{{ $room->building }}</td>
                </tr>
                @endforeach
            </table>
            {!! $rooms->links() !!}
        </div>
    </div>
@endsection