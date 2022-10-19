@extends('admin.layouts.master')
@section('content')
    <div class="form-control">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        add role for user: {{ $user->name }}
                        <a href="{{ route('user.index') }}">back to all users</a>
                    </div>

                    <form action="{{ route('user.insertrole',['user'=>$user->id]) }}" method="post">
                        @csrf
                        @foreach($role as $role)
                            @if(isset($all_clm_role))
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" {{ $role->id == $all_clm_role->id ? 'checked' :'' }} name="role" id="{{ $role->id }}" value="{{ $role->name }}">
                            <label for="{{ $role->id }}" class="form-check-input">{{ $role->name }}</label>
                        </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="role" id="{{ $role->id }}" value="{{ $role->name }}">
                                    <label for="{{ $role->id }}" class="form-check-input">{{ $role->name }}</label>
                                </div>
                            @endif
                        @endforeach
                        <br>
                        <button class="btn btn-success">Add role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
