@extends('admin.layouts.master')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <h1>
        Edit Article
    </h1>
    <a href="{{ route('article.index') }}">Back to all article</a>
    <div class="card">

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="author_id" name="author_id" value="1" class="form-control">

                <div class="form-group">
                    <label for="name">Title</label>
                    <input onkeyup="ChangeToSlug();" type="text" id="name" name="title" class="form-control" value="{{ $article->title }}">
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $article->slug }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ $article->description }}">
                </div>

                <div class="form-group">
                    <label for="example-textarea">Content</label>
                    <textarea class="form-control" id="example-textarea" name="content" rows="5">{{ $article->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="example-textarea">Thumbnail</label>
                    <input type="file" id="thumb" name="thumb" class="form-control" value="{{ $article->thumb }}">
                    <img src="{{$article->thumb}}" alt="" style="height: 90px">
                </div>

                <div class="form-group">
                    <label for="parent">Category</label>
                    <select class="custom-select mb-3" name="category_id">
                        <option value="0">-</option>
                        @foreach($category as $Category)
                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="parent">Tag</label>
                    <select class="custom-select mb-3" name="tag_id">
                        <option value="0">-</option>
                        @foreach($tags as $tags)
                            <option value="{{ $tags->id }}">{{ $tags->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="mt-2">
                        Status:
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio3" value="0" name="status" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio3">PUBLISHED</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio4" value="1" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">DRAFT</label>
                        </div>
                    </div>
                </div>


                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>

    <script language="javascript" src="{{ asset('js/generateslug.js') }}"></script>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
