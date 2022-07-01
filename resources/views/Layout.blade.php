<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href='{{asset("admin/css/fontawesome.all.css")}}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{ asset("admin//css/adminlte.css")}}'>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <form action="{{url('logout')}}" method="post" id="logout_form" style="display: none;">
        @csrf
      </form>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a id="logout_link" class="nav-link btn  active" href="#"><h4>logout</h4></a>
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{"uploads/users/".Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p class="d-block">{{Auth::user()->name}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <p>
                Users
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.navbar -->

   <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                @yield('main')
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{{-- edit user modal --}}
<div class="modal fade show" id="modal-xl-edit" style="display: none; padding-right: 16px;" aria-modal="true">
    <div class="modal-dialog modal-xl-edit">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="edit_user_form" method="POST"  class="form-horizontal">
            @csrf
            <div class="card-body">

                  <p id="name-edit-error" style="color: red"></p>


               <input type="hidden" name="role" value="user">
               <input type="hidden" name="id" id="edit-form-id">
          <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="edit-form-name" placeholder="Enter Your Name">
                  </div>
              </div>

              <p id="email-edit-error" style="color: red"></p>

              <div class="form-group row">

                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="edit-form-email" placeholder="Email">
                  </div>
              </div>

              <p id="phone-edit-error" style="color: red"></p>

              <div class="form-group row">

                  <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                      <input type="text" name="phone" class="form-control" id="edit-form-phone" placeholder="phone">
                  </div>
              </div>

              <p id="age-edit-error" style="color: red"></p>

              <div class="form-group row">

                  <label for="age" class="col-sm-2 col-form-label">Age</label>
                  <div class="col-sm-10">
                      <input type="number" name="age" class="form-control" id="edit-form-age" placeholder="age">
                  </div>
              </div>

              <p id="password-edit-error" style="color: red" ></p>

              <div class="form-group row">

                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
              </div>

              <p id="image-edit-error" style="color: red"></p>

              <div class="form-group">

                  <label for="image">Image</label>
                  <input name="image" type="file" class="form-control-file" id="image">
                </div>

                  <p id="gender-edit-error" style="color: red"></p>

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
              <button id="submit_btn_edit" class="btn btn-info">Register</button>
          </div>
        </form>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  {{-- /end user modal --}}

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src='{{asset("admin/js/jquery.js")}}'></script>
<!-- Bootstrap 4 -->
<script src='{{asset("admin/js/bootstrap.bundle.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{asset("admin/js/adminlte.js")}}'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script >
    $("#logout_link").click(function(e){
      e.preventDefault()
      $("#logout_form").submit();
    })
  </script>
@yield('scripts')
</body>
</html>
