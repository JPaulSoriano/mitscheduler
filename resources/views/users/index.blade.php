@extends('layouts.app')
@section('content')

  @if (count($errors) > 0)
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
        <div class="card-header">Add User</div>
        <div class="card-body">
          {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
          <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Username:</label>
                      {!! Form::text('name', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email:</label>
                      {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Password:</label>
                      {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Confirm Password:</label>
                      {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Role:</label>
                      {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                  </div>
              </div>
              <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <h3>Users</h3>
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Email</th>
          <th>Roles</th>
        </tr>
        @foreach ($data as $key => $user)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
                @endforeach
              @endif
            </td>
            <td>
              <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            </td>
            <td><a class="btn btn-sm btn-primary" href="{{ route('users.teachers.index', $user) }}">Profile</a></td>
          </tr>
        @endforeach
     </table>
    {!! $data->render() !!}
    </div>
  </div>
@endsection