@extends('layout.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">My company</h1>
        <div class="row">
            <div class="mb-3 col-md-3" style="min-width: 200px;">
                <div class="card border-primary">
                    <div class="card-header">Users</div>
                    <div class="card-body text-primary">
                      <h5 class="card-title">{{ $user->count() }} {{ Str::plural('user', $user->count()) }}</h5>
                      <p class="card-text"><a href="{{ route('allusers') }}">view all</a></p>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-3" style="min-width: 200px;">
                <div class="card border-primary">
                    <div class="card-header">Job</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-3" style="min-width: 200px;">
                <div class="card border-primary">
                    <div class="card-header">Department</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection