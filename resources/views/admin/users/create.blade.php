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
                <label for="role">Role</label>
                    @foreach($role as $role)
                            <div class="mt-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="{{ $role->id }}" name="role" class="custom-control-input" value="{{ $role->name }}" checked>
                                    <label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            </div>
                        @endforeach
                <br>
{{--                <label for="permisson">Permission</label>--}}
{{--                    @foreach($permisson as $per)--}}
{{--                            <div class="mt-3">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" name="permisson" id="{{ $per->id }}">--}}
{{--                                    <label class="custom-control-label" for="{{ $per->id }}">{{ $per->name }}</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                <br>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>


@endsection
