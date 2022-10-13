@extends('admin.layouts.master')
@section('content')
    <h1>
        Role list
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('role.create') }}" class="btn btn-primary">
                + Add Role
            </a>

            <form class="float-right">
                Search <input type="search" name="q" value="{{ $search }}">
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Name</th>
                    <th>Permisson</th>
                    <th>Action</th>
                </tr>
                @foreach($role as $roles)
                    <tr>
                        <td>{{ $roles->name }}</td>
{{--                        <td>--}}
{{--                            @foreach($permisson as $per)--}}
{{--                                <div class="form-check">--}}
{{--                                    <input type="checkbox" class="form-check-input" value="" id="{{ $per->id }}">--}}
{{--                                    <label class="form-check-input" for="{{  $per->id }}"> {{$per->name}}</label>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </td>--}}
                        <td></td>
                        <td style="display: flex">
                            <a href="{{ route('role.edit',['role'=>$roles->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('role.destroy',['role'=>$roles->id]) }}" method="post" style="margin-left: 10px">
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
            {{ $role->links() }}
        </div>
    </div>


@endsection

