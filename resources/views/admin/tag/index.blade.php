@extends('admin.layouts.master')
@section('content')
    <h1>
        Tags
    </h1>
    <div class="card">
        <div class="card-header">
            @if(auth()->user()->can('Tag Manager') || auth()->user()->can('User Manager'))
            <a href="{{ route('tag.create') }}" class="btn btn-primary">+ Add tag</a>
            @endif
            <form class="float-right">
                Search: <input type="search" name="q" value="{{ $search }}" >
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>

                @foreach($tag as $Tag)
                    <tr>
                        <td>{{ $Tag->name }}</td>
                        <td>{{ $Tag->slug }}</td>
                        <td>{{ $Tag->created_at }}</td>
                        <td style="display: flex">
                            @if(auth()->user()->can('Tag Manager') || auth()->user()->can('User Manager'))
                            <a href="{{ route('tag.edit',['tag'=>$Tag->id]) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('tag.destroy',['tag'=>$Tag->id]) }}" method="post" style="margin-left: 10px">
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
                    {{ $tag->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
