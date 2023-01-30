@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-6 text-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @foreach ($academicyears as $academicyear)
                <h1>Current Year: <span class="font-weight-bold">{{ $academicyear->name }}</span></h1>
                <a class="btn btn-primary" href="{{ route('academicyears.edit', $academicyear->id) }}">Update</a>
            @endforeach
        </div>
    </div>


@endsection