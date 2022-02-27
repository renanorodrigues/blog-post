@extends('layout')

@section('main-content')
  <div class='offset-sm-2 col-sm-8'>
    <ul class="nav nav-tabs my-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('users') }}">List Users</a>
      </li>
    </ul>
  
    <h3 class="fs-3 my-3">Show User</h3>

    <div class="card">
      <h5 class="card-header">
        Personal Information
      </h5>
      <ul class="list-group">
        <li class="list-group-item">
          <strong>Code: </strong>
          <span>{{ $user->id }}</span>
        </li>
        <li class="list-group-item">
          <strong>Full Name: </strong>
          <span>{{ $user->fullName() }}</span>
        </li>
        <li class="list-group-item">
          <strong>E-mail: </strong>
          <span>{{ $user->email }}</span>
        </li>
      </ul>
    </div>

    <a
      class="btn btn-primary mt-2"
      href="{{ url('users/'.$user->id.'/edit') }}"
      role="button">Edit User
    </a>
  </div>
@endsection