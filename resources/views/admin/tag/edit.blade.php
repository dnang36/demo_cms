@extends('admin.layouts.master')
@section('content')
    <h1>
        Edit Tag
    </h1>
    <a href="{{ route('tag.index') }}">back to all tag</a>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tag.update',['tag'=>$tag->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input onkeyup="ChangeToSlug();" type="text" id="name" name="name" class="form-control" value="{{ $tag->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $tag->slug }}">
                </div>

                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/generateslug.js') }}"></script>
@endsection
