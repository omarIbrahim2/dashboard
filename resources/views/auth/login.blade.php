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
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="{{route('showLogin')}}">Login</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('showRegister')}}">Register</a>
              </li>


          </ul>
        </div>
      </nav>


    <div class="container  mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Login</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{url('login')}}" class="form-horizontal">

                        @csrf
                        <div class="card-body">
                            @if (Session::has('errors'))
                              <p style="color: red">{{Session::get('errors')->first()}}</p>
                            @endif
                            @error('name')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>

                            @error('email')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Checkbox">
                                        <label class="form-check-label" name="remember" for="Checkbox">Remember me</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>



                </div>

    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src='{{asset("admin/js/jquery.js")}}'></script>
    <!-- Bootstrap 4 -->
    <script src='{{asset("admin/js/bootstrap.bundle.js")}}'></script>
    <!-- AdminLTE App -->
    <script src='{{asset("admin/js/adminlte.js")}}'></script>
</body>

</html>
