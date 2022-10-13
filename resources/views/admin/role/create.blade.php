@extends('admin.layouts.master')
@section('content')

    <h1>
        Add role
    </h1>
    <a href="{{ route('role.index') }}">back to all role</a>

    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <label for="name">Permisson</label>
            @foreach($permisson as $per)
                    <div class="mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{ $per->id }}" name="permisson[]" value="{{ $per->name }}">
                            <label class="custom-control-label" for="{{ $per->id }}">{{ $per->name }}</label>
                        </div>
                    </div>
                    @endforeach
                <br>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>


@endsection
