@extends('layout.app')

@section('content')
    {{-- success alert --}}
    @if (\Session::has('newUserSuccess'))
        <div class="alert alert-success text-center" style="border-radius: 0">
            {!! \Session::get('newUserSuccess') !!}
        </div>
    @endif
    @error('role')
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 0; border: none; margin-bottom: 0;">
            <div class="fs-6 fw-bold">
                <i class="fas fa-exclamation-triangle"></i>&nbsp; {{ $message }}
            </div>
        </div>
    @enderror
    @error('email')
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 0; border: none; margin-bottom: 0;">
            <div class="fs-6 fw-bold">
                <i class="fas fa-exclamation-triangle"></i>&nbsp; {{ $message }}
            </div>
        </div>
    @enderror
    @error('username')
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 0; border: none; margin-bottom: 0;">
            <div class="fs-6 fw-bold">
                <i class="fas fa-exclamation-triangle"></i>&nbsp; {{ $message }}
            </div>
        </div>
    @enderror
    @error('name')
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 0; border: none; margin-bottom: 0;">
            <div class="fs-6 fw-bold">
                <i class="fas fa-exclamation-triangle"></i>&nbsp; {{ $message }}
            </div>
        </div>
    @enderror

    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">All users</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">New user</button>
            </div>
            <!-- Topbar Search -->
            <form
            class="d-none d-sm-inline-block form-inline w-50 ml-md-3 my-2 mt-4 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">Create new user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('createNewUser') }}" method="post">
                        @csrf
                        <div class="modal-body">
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
                                id="exampleInputPassword" placeholder="Repeat password">
                                {{-- error when the form is empty --}}
                                @error('password')
                                    <div class="alert alert-light small" role="alert" style="color: red;"> {{ $message }} </div>
                                @enderror
                            </div>
                            {{-- dropdown admin or user --}}
                            <div class="form-group">
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                    <option class="form-control form-control-user" value="" selected>Select role</option>
                                    <option value="1" class="form-control form-control-user">Admin</option>
                                    <option value="2" class="form-control form-control-user">Employee</option>
                                </select>
                                @error('role')
                                    <div class="alert alert-light small" role="alert" style="color: red;"> {{ $message }} </div>
                                @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->id==request()->segment(count(request()->segments())))
                                <tr>
                                    <form action="{{ route('updateUser', $user) }}" method="post" id="updateUser">@csrf</form>
                                        <td>
                                            <input form="updateUser" type="text" name="name" class="form-control input-normal" id="" value="{{ $user->name }}">
                                        </td>
                                        <td>
                                            <input form="updateUser" type="text" name="username" class="form-control input-normal" id="" value="{{ $user->username }}">
                                        </td>
                                        <td>
                                            <input form="updateUser" type="text" name="email" class="form-control input-normal" id=""value="{{ $user->email }}">
                                        </td>
                                        <td>
                                            <select form="updateUser" name="role" id="role" class="form-control input-normal">
                                                <option class="form-control form-control-user" value="" selected>Role</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Employee</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="submit" form="updateUser" class="btn btn-primary">Update</button>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('allusers') }}" class="btn btn-link">Back</a>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->role === 1)
                                        <td>Admin</td>
                                    @else
                                        <td>Employee</td>
                                    @endif
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">

                                        </div>
                                    </td>
                                </tr>
                                @endif
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection