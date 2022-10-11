<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $User = User::query()->where('name','like','%'.$search.'%')->paginate(15);
        $User->appends(['q'=>$search]);

        return view('admin.users.index',[
            'user'=> $User,
            'search'=>$search,
            'title'=>'Users list'
        ]);
    }

    public function create()
    {
        return view('admin.users.create',[
            'title'=>'Add new User'
        ]);
    }

    public function store(StoreRequest $request)
    {

//        dd($request->input());

        $validate = $request->validated();

        if ($validate){

            $user = new User();
            $user->name = $request->get('name');
            $user->email=$request->get('email');
            $user->password=Hash::make($request->input('password'));
            $user->role = $request->get('role');
            $user->save();

            Session::flash('success','tao user moi thanh cong');

            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'title'=>'edit user',
            'user'=>$user,
        ]);
    }

    public function update(StoreRequest $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->input('password'));
        $user->role = $request->get('role');
        $user->save();

        Session::flash('success','cap nhat user thanh cong');

        return redirect()->back();
    }
}
