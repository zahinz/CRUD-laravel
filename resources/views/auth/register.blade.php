<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Company App - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-10">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('register') }}">
                                        @csrf
                                        {{-- name --}}
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user"
                                            id="exampleInputname" aria-describedby="Your full name"
                                            placeholder="Full name">
                                            {{-- error when the form is empty --}}
                                            @error('name')
                                                <div class="alert alert-light small" role="alert" style="color: red;">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        {{-- username --}}
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                            id="exampleInputusername" aria-describedby="Your username"
                                            placeholder="Username">
                                            {{-- error when the form is empty --}}
                                            @error('username')
                                                <div class="alert alert-light small" role="alert" style="color: red;">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        {{-- email --}}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter email address...">
                                            {{-- error when the form is empty --}}
                                            @error('email')
                                                <div class="alert alert-light small" role="alert" style="color: red;">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        {{-- password --}}
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            {{-- error when the form is empty --}}
                                            @error('password')
                                                <div class="alert alert-light small" role="alert" style="color: red;"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        {{-- password confirmation --}}
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Repeat your password">
                                            {{-- error when the form is empty --}}
                                            @error('password')
                                                <div class="alert alert-light small" role="alert" style="color: red;"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        {{-- dropdown admin or user --}}
                                        <div class="form-group">
                                            
                                            <select class="form-control" id="exampleFormControlSelect1" name="role" style="font-size: .8rem; border-radius: 10rem; height: 48px">
                                                <option class="form-control form-control-user" value="" selected>Select your role</option>
                                                <option value="1" class="form-control form-control-user">Admin</option>
                                                <option value="2" class="form-control form-control-user">Employee</option>
                                            </select>
                                            @error('role')
                                                <div class="alert alert-light small" role="alert" style="color: red;"> {{ $message }} </div>
                                            @enderror
                                          </div>
                                        {{-- submit --}}
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Register">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Have an account? Sign in instead.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>