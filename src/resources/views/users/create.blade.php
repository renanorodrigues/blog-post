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
    </ul>
  
    <h3 class="fs-3 my-3">New User</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


    <form method='POST' action='/users'>
      @csrf
      <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="first_name" name="users[first_name]">
        </div>
      </div>
  
      <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="last_name" name="users[last_name]">
        </div>
      </div>
  
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="email" name="users[email]" placeholder="email@example.com">
        </div>
      </div>
  
      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="password" name="users[password]">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Profile</label>
        <div class="col-sm-6">
          <div class="form-group">
            <select multiple class="form-control" id="profiles" name="profiles[]">
              @foreach(App\Models\Profile::enum_profiles() as $profile_name => $profile_id)
                <option value='{{ $profile_id }}'>
                  {{ $profile_name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
  
      <input class="btn btn-primary" type="submit" value="Submit">
      <a class="btn btn-secondary" href="{{ url('users') }}" role="button">List Users</a>
    </form>
  </div>
@endsection