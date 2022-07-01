@extends('Layout')


@section('main')

@section('main')
<h2>Dashboard</h2>

<div>
  <div class="card-header">
    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <button type="button" data-toggle="modal" data-target="#modal-xl" class="btn btn-success">Add new user</button>
      </div>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Image</th>

    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)

    <tr class="userRow{{$user->id}}">
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        <img style="width: 20px" src="{{"uploads/users/$user->image"}}" alt="userImage">
      </td>

      <td>
        <button type="button" class="btn btn-primary edit-btn" data-age="{{$user->age}}" data-phone="{{$user->phone}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#modal-xl-edit"><i class="fas fa-user-edit"></i></button>
        <a data-user="{{$user->id}}"  class="deleteUser btn btn-danger" href=""> <i class="fas fa-trash"></i></a>
      </td>

    </tr>
    @endforeach

  </tbody>


</table>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>

<div class="modal fade show" id="modal-xl" style="display: none; padding-right: 16px;" aria-modal="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Register New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_user" method="POST"  class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            @error('name')
                <p style="color: red">{{$message}}</p>
             @enderror

             <input type="hidden" name="role" value="user">
           <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
                </div>
            </div>
            @error('email')
            <p style="color: red">{{$message}}</p>
         @enderror
            <div class="form-group row">

                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            @error('phone')
            <p style="color: red">{{$message}}</p>
         @enderror
            <div class="form-group row">

                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                </div>
            </div>
            @error('age')
            <p style="color: red">{{$message}}</p>
           @enderror
            <div class="form-group row">

                <label for="age" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                    <input type="number" name="age" class="form-control" id="age" placeholder="age">
                </div>
            </div>
            @error('password')
            <p style="color: red" >{{$message}}</p>
           @enderror
            <div class="form-group row">

                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
            @error('image')
            <p style="color: red">{{$message}}</p>
           @enderror
            <div class="form-group">

                <label for="image">Image</label>
                <input name="image" type="file" class="form-control-file" id="image">
              </div>
              @error('gender')
                <p style="color: red">{{$message}}</p>
               @enderror
              <div class="form-group">

                <label >Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                <label class="form-check-label" for="exampleRadios1">
                    Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                <label class="form-check-label" for="exampleRadios2">
                  Female
                </label>
              </div>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button id="submit_user" class="btn btn-info">Register</button>
        </div>
      </form>
    </div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>






@endsection


@section("scripts")

<script>



  $(".edit-btn").click(function(){
    $("#modal-xl-edit").modal('toggle');
    let id = $(this).attr("data-id")
    let name = $(this).attr("data-name")
    let email = $(this).attr("data-email")
    let phone = $(this).attr("data-phone")
    let age = $(this).attr("data-age")


    $("#edit-form-id").val(id)
    $("#edit-form-name").val(name)
    $("#edit-form-email").val(email)
    $("#edit-form-phone").val(phone)
    $("#edit-form-age").val(age)

  })
</script>
<script>
$('#submit_user').click(function(e){
    e.preventDefault();
    let formData = new FormData($('#add_user')[0]);
    $.ajax({
        type:'POST',
        url:"{{url('dashboard/addUser')}}",
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType:false,
        cache:false,
        success:function(data){
           if (data.status == true) {
              swal.fire({
                icon:'success',
                title:data.message,
              });
              $('#modal-xl').modal('toggle');
           }
        }
    })
})

$(".deleteUser").click(function(e){
    e.preventDefault();
   let userId = $(this).data("user");
   $.ajax({
        type:'POST',
        url:"{{url('dashboard/deleteUser')}}",
        data:{
            '_token':"{{csrf_token()}}",
            'id':userId,
        },

        success:function(data){
           if (data.status == true) {
              swal.fire({
                icon:'error',
                title:data.message,
              });

           }
           $('.userRow'+data.id).remove();
        }
    })




})

$("#submit_btn_edit").click(function(e){
    e.preventDefault();
    let formData = new FormData($('#edit_user_form')[0]);

    $.ajax({
        type:'POST',
        url:"{{url('dashboard/updateUser')}}",
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType:false,
        cache:false,
        success:function(data){
           if (data.status == true) {
              swal.fire({
                icon:'success',
                title:data.message,
              });
              
           }
        }
    })
})


</script>
@endsection





@endsection
