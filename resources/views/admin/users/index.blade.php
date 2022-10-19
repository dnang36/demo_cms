@extends('admin.layouts.master')
@section('content')
    <h1>
        User list
    </h1>

    <div class="card">
        <div class="card-header">
            @can('User Manager')
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                + Add User
            </a>
            @endcan
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
                    <th>Permisson</th>
                    <th>Action</th>
                </tr>

                @foreach($user as $User)
                    <tr>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->email }}</td>
{{--                        <td>{{ $User->role }}</td>--}}
                        <td>
                            @foreach($User->roles as $key=>$role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($role->permissions as $key=>$permissions)
                                <h4> <span class="badge badge-info"> {{ $permissions->name }}</span> </h4>
                            @endforeach
                        </td>
                        <td style="display: flex">
                            @can('User Manager')
                            <a href="{{ route('user.addrole',['user'=>$User->id]) }}" class="btn btn-success">Add role</a>
                            <a href="{{ route('user.addpermisson',['user'=>$User->id]) }}" class="btn btn-secondary" style="margin: 0 10px">Add permisson</a>
                            <a href="{{ route('user.edit',['user'=>$User->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('user.destroy',['user'=>$User->id]) }}" method="post" style="margin-left: 10px">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
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
