@extends('admin.layouts.master')
@section('content')
    <h1>
        Category list
    </h1>
    <div class="card">
        <div class="card-header">
            @if(auth()->user()->can('Category Manager') || auth()->user()->can('User Manager'))
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                + Add Category
            </a>
            @endif
            <form action="" class="float-right">
                    Search <input type="search" id="search" name="q" value="{{ $search }}">
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Article</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
                @foreach($category as $Category)
                    <tr>
                        <td>{{ $Category->name }}</td>
                        <td>{{ $Category->slug }}</td>
                        <td>{{ $Category->parent_id }}</td>
                        <td></td>
                        <td>{{ $Category->created_at }}</td>
                        <td style="display: flex">
                            @if(auth()->user()->can('Category Manager') || auth()->user()->can('User Manager'))
                            <a href="" class="btn btn-info">Preview</a>
                            <a href="{{ route('category.edit',['category'=>$Category->id]) }}" class="btn btn-warning" style="margin: 0px 10px">Edit</a>
                            <form action="{{ route('category.destroy',['category'=>$Category->id]) }}" method="post">
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
                    {{ $category->links() }}
                </ul>
            </nav>
        </div>
    </div>

@endsection
