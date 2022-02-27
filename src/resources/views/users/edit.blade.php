@extends('layout')

@section('main-content')
  <div class='offset-sm-2 col-sm-10'>
    <ul class="nav nav-tabs my-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('users') }}">List Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('users/'.$user->id) }}">Show User</a>
      </li>
    </ul>
  
    <h3 class="fs-3 my-3">Edit User</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


    <form method='POST' action="{{ url('users', [$user->id]) }}">
      {{method_field('PUT')}}
      @csrf
      <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="first_name" name="first_name" value='{{ $user->first_name }}'>
        </div>
      </div>
  
      <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="last_name" name="last_name" value='{{ $user->last_name }}'>
        </div>
      </div>
    
      <input class="btn btn-primary" type="submit" value="Submit">
      <a class="btn btn-secondary" href="{{ url('users/'.$user->id) }}" role="button">
        <i class="fa-solid fa-address-card"></i> Show User
      </a>
    </form>
  </div>
@endsection