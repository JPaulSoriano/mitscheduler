
@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
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
            <form action="{{ route('academicyears.update', $academicyear->id) }}" method="POST">
                @csrf
                @method('PUT')

                 <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" value="{{ $academicyear->name }}" class="date-own form-control" placeholder="Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection