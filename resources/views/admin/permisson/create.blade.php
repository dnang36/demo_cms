@extends('admin.layouts.master')
@section('content')

    <h1>
        Add permisson
    </h1>
    <a href="{{ route('permisson.index') }}">back to all permisson</a>

    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{ route('permisson.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>


@endsection
