@extends('layout')

@section('main-content')
  <div class='offset-sm-2 col-sm-8'>
    <ul class="nav nav-tabs my-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
    </ul>
  
    <h3 class="fs-3 my-3">List Users</h3>

    @if(!empty($message))
      <div class="alert alert-success">
          {{ $message }}
      </div>
    @endif

    <table id="table_users" class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr id="tr_user_{{ $user->id }}">
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a 
                class="btn btn-info btn-sm"
                href="{{ url('users/'.$user->id) }}"
                role="button">
                <i class="fa-solid fa-address-card"></i>
              </a>

              <a 
                class="btn btn-warning btn-sm"
                href="{{ url('users/'.$user->id.'/edit') }}"
                role="button">
                <i class="fa-solid fa-user-pen"></i>
              </a>

              <button
                id="btn_destroy_user"
                class="btn btn-danger btn-sm"
                data-id="{{ $user->id }}" 
                data-token="{{ csrf_token() }}" 
              >
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a class="btn btn-primary" href="{{ url('users/create') }}" role="button">
      <i class="fa-solid fa-user-plus"></i> New User
    </a>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $("#btn_destroy_user").click(function(){
      var id = $(this).data("id");
      var token = $(this).data("token");
      var confirmed = confirm("Are you sure?");

      if(confirmed){
        $.ajax({
          url: "users/" + id,
          type: 'DELETE',
          dataType: "JSON",
          data: {
              "id": id,
              "_method": 'DELETE',
              "_token": token,
          },
          success: function (data){
            var remove_tr_table = $("#tr_user_" + data['user_id']);
            remove_tr_table.remove();
          }
        });
      }
    });
  </script>
@endsection