@extends('layout.app')

@section('content')
    {{-- success new user alert --}}
    @if (\Session::has('newUserSuccess'))
        <div class="alert alert-success text-center" style="border-radius: 0">
            {!! \Session::get('newUserSuccess') !!}
        </div>
    @endif

    {{-- success update user alert --}}
    @if (\Session::has('updateUserSuccess'))
        <div class="alert alert-success text-center" style="border-radius: 0">
            {!! \Session::get('updateUserSuccess') !!}
        </div>
    @endif

    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">All users</h6>
                <div>
                    <a href="{{ route('downloadAllUser') }}" class="btn btn-outline-primary mr-1"><i class="fas fa-file-export"></i> Export CSV</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">New user</button>
                </div>
            </div>
            <!-- Topbar Search -->
            <form
            class="d-none d-sm-inline-block form-inline w-50 ml-md-3 my-2 mt-4 mw-100 navbar-search" action="{{ route('searchUser')}}" method="post">
                <div class="input-group">
                    @csrf
                    <input name="query" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
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
                                <th>Created on</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created on</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
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
                                            <span class="mr-2">{{ $user->created_at->diffForHumans() }}</span>
                                            <div class="d-flex justify-content-between">
                                                @if ($user->id !== auth()->user()->id)   
                                                    <div>
                                                        <a href="{{ route('editUser', $user) }}" class="btn btn-link">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                    </div>  
                                                    <button type="button" class="btn btn-link mr-2 text-danger" data-toggle="modal" data-target="#deleteUser"><i class="far fa-trash-alt text-danger"></i> Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteUser" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="deleteUserLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteUserLabel">Delete user</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            The data is unable to recover after deleted. Are you sure?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
  
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection