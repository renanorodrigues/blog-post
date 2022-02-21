@extends('layout')

@section('main-content')
  <form method='POST' action='/users'>
    @csrf
    <div class="mb-3 row">
      <label for="first_name" class="col-sm-1 col-form-label">First Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="first_name" name="first_name">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="last_name" class="col-sm-1 col-form-label">Last Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="last_name" name="last_name">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="email" class="col-sm-1 col-form-label">Email</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="email" name="email" value="email@example.com">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="password" class="col-sm-1 col-form-label">Password</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="password" name="password">
      </div>
    </div>

    <input class="btn btn-primary" type="submit" value="Submit">
  </form>
@endsection