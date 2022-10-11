@extends('admin.layouts.master')
@section('content')
    <h1>
        Permisson list
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('permisson.create') }}" class="btn btn-primary">
                + Add permisson
            </a>

            <form class="float-right">
                Search <input type="search" name="q" value="{{ $search }}">
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach($permissons as $permisson)
                    <tr>
                        <td>{{ $permisson->name }}</td>
                        <td style="display: flex">
                            <a href="{{ route('permisson.edit',['permisson'=>$permisson->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('permisson.destroy',['permisson'=>$permisson->id]) }}" method="post" style="margin-left: 10px">
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
            {{ $permissons->links() }}
        </div>
    </div>


@endsection

