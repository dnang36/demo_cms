@extends('admin.layouts.master')
@section('content')

    <h1>
        Add User
    </h1>
    <a href="{{ route('user.index') }}">back to all users</a>

    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="password" name="password_confirmation" class="form-control">
                </div>
                Role
                <div class="mt-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio5" name="role" value="0" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadio5">User</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio6" name="role" value="1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio6">Admin</label>
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>


@endsection
