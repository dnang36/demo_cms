@extends('admin.layouts.master')


@section('content')
    <h1>
        Articles List
    </h1>

    <div class="card">

        <div class="card-header">
            <div class="row">
                @if(auth()->user()->can('Article Manager') || auth()->user()->can('User Manager'))
                <a href="{{ route('article.create') }}" class="btn btn-primary">
                    + Add article
                </a>
                @endif

                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle ml-3" href="" style="height: 42px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc theo danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($categories as $key=>$category)
                            <a class="dropdown-item" href="?category={{ $category->id }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle ml-3" href="" style="height: 42px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc theo tag
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($tags as $key=>$tag)
                            <a class="dropdown-item" href="?tag={{ $tag->id }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>

            </div>
            <form class="float-right">
                Search <input type="search" name="q">
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Thumb</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>Action</th>
                </tr>
                @foreach($article as $Article)
                    <tr>
                        <td>{{ $Article->title }}</td>
                        <td>{{ $Article->created_at }}</td>
                        <td>{{ $Article->status }}</td>
{{--                        <td>{{ url('public/img') }}/{{ $Article->thumb }}</td>--}}
                        <td><img src="http://demo_cms.test/public/img/{{ $Article->thumb }}"  height="60px"></td>
                        <td>{{ $Article->category->name }}</td>
                        <td>{{ $Article->tag->name }}</td>
                        <td style="display: flex">
                            @if(auth()->user()->can('Article Manager') || auth()->user()->can('User Manager'))
                            <a href="" class="btn btn-info">Preview</a>
                            <a href="{{ route('article.edit',['article'=>$Article->id]) }}" class="btn btn-warning" style="margin: 0px 10px">Edit</a>
                            <form action="{{ route('article.destroy',['article'=>$Article->id])  }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="card-footer">
            <nav>
                <ul class="pagination pagination-rounded mb-0">
                    {{ $article->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

