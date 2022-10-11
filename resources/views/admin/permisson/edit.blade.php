@extends('admin.layouts.master')
@section('content')

    <h1>
        edit permisson
    </h1>
    <a href="{{ route('permisson.index') }}">back to all permisson</a>

    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{ route('permisson.update',['permisson'=>$permissons->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $permissons->name }}">
                </div>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>


@endsection

