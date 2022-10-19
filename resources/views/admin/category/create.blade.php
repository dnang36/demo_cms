@extends('admin.layouts.master')
@section('content')
    <h1>
        Add Category
    </h1>
    <a href="{{ route('category.index') }}">Back to all Category</a>
    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input onkeyup="ChangeToSlug();" type="text" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <label for="example-textarea">Description</label>
                    <textarea class="form-control" id="example-textarea" name="description" rows="5"></textarea>
                    <input type="hidden" value="0" id="content" name="content" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="custom-select mb-3" name="category_id">
                        <option value="0">-</option>
                        @foreach($parent as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>

    <script language="javascript" src="{{ asset('js/generateslug.js') }}"></script>
@endsection
