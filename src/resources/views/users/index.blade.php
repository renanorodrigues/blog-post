@extends('layout')

@section('main-content')
  <nav class="mb-3 mt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
  </nav>

  @if(!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
  @endif

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->first_name }}</td>
          <td>{{ $user->last_name }}</td>
          <td>{{ $user->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <a class="btn btn-primary" href="{{ url('users/create') }}" role="button">New User</a>
@endsection