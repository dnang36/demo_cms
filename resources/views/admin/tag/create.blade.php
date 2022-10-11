@extends('admin.layouts.master')
@section('content')
    <h1>
        Add Tag
    </h1>
    <a href="{{ route('tag.index') }}">back to all tag</a>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tag.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input onkeyup="ChangeToSlug();" type="text" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>

                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/generateslug.js') }}"></script>
@endsection
