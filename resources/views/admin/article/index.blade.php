@extends('admin.layouts.master')
@section('content')
    <h1>
        Articles List
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('article.create') }}" class="btn btn-primary">
                + Add article
            </a>
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
                    <th>Action</th>
                </tr>
                @foreach($article as $Article)
                    <tr>
                        <td>{{ $Article->title }}</td>
                        <td>{{ $Article->created_at }}</td>
                        <td>{{ $Article->status }}</td>
                        <td>{{ $Article->thumb }}</td>
                        <td>{{ $Article->category_id }}</td>
                        <td style="display: flex">
                            <a href="" class="btn btn-info">Preview</a>
                            <a href="{{ route('article.edit',['article'=>$Article->id]) }}" class="btn btn-warning" style="margin: 0px 10px">Edit</a>
                            <form action="{{ route('article.destroy',['article'=>$Article->id])  }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
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
