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
                <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">Edit user</h6>
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