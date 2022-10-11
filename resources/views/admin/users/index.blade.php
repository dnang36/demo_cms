@extends('admin.layouts.master')
@section('content')
    <h1>
        User list
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                + Add User
            </a>

            <form class="float-right">
                Search <input type="search" name="q" value="{{ $search }}">
            </form>
        </div>

        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>

                @foreach($user as $User)
                    <tr>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->email }}</td>
{{--                        <td>{{ $User->role }}</td>--}}
                        @if( $User->role ===0)
                            <td>User</td>
                        @else
                            <td>Admin</td>
                        @endif
                        <td style="display: flex">
                            <a href="{{ route('user.edit',['user'=>$User->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('user.destroy',['user'=>$User->id]) }}" method="post" style="margin-left: 10px">
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
            {{ $user->links() }}
        </div>
    </div>


@endsection
