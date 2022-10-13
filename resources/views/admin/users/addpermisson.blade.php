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

                    <form action="" method="post">
                        @csrf
                        @if(isset($name_role))
                        <label>Vai tro hien tai: {{ $name_role }}</label><br>
                        @endif
                                        <label for="permisson">Permission</label>
                                            @foreach($permisson as $per)
                                                    <div class="mt-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   @foreach($get_per as $get)
                                                                       @if($get->id == $per->id)
                                                                           checked
                                                                       @endif
                                                                   @endforeach
                                                                   name="permisson[]" id="{{ $per->id }}" value="{{ $per->id }}">
                                                            <label class="custom-control-label" for="{{ $per->id }}">{{ $per->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                        <br>
                        <button class="btn btn-success">Add permisson</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
