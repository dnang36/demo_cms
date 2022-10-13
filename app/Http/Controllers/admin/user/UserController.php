<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\StoreRequest;
use App\Models\admin\permisson;
use App\Models\admin\roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('q');

        $User = User::query()->with('roles','permissions')->where('name','like','%'.$search.'%')->paginate(5);
        $User->appends(['q'=>$search]);

        return view('admin.users.index',[
            'user'=> $User,
            'search'=>$search,
            'title'=>'Users list',
        ]);
    }

    public function create()
    {
        $role = roles::query()->get();
        $permisson = permisson::query()->get();

        return view('admin.users.create',[
            'title'=>'Add new User',
            'role'=>$role,
            'permisson'=>$permisson,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
//        dd($data['role']);
        $validate = $request->validated();
//        dd($validate);
        if ($validate){
            $user = new User();
            $user->name = $request->get('name');
            $user->email=$request->get('email');
            $user->password=Hash::make($request->input('password'));
//            auth()->user()->syncRoles($data['role']);
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
        $role = roles::query()->get();

        return view('admin.users.edit',[
            'title'=>'edit user',
            'user'=>$user,
            'role'=>$role,

        ]);
    }

    public function update(StoreRequest $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->input('password'));
        $user->save();

        Session::flash('success','cap nhat user thanh cong');

        return redirect()->back();
    }

    public function addrole($id)
    {
        $user = User::query()->find($id);
//        $name_role = $user->roles->first()->name;
        $role = roles::query()->orderByDesc('id')->get();
//        $all_clm_role = $user->roles->first();

        return view('admin.users.addrole',[
            'title'=>'Add role for User',
            'user'=>$user,
//            'name_role'=>$name_role,
            'role'=>$role,
//            'all_clm_role'=>$all_clm_role,
        ]);
    }

    public function insertrole(Request $request,$id)
    {
        $data = $request->all();
        $user = User::query()->find($id);
//        dd($data);
        $user->syncRoles($data['role']);

        Session::flash('success','cap nhat role thanh cong');

        return redirect()->back();
    }

    public function addpermisson($id)
    {
        $user = User::query()->find($id);
        $permisson = Permission::query()->orderByDesc('id')->get();
        $name_role = $user->roles->first()->name;
        //lasy quyen
        $get_per = $user->getPermissionsViaRoles();
//        dd($get_per);

        return view('admin.users.addpermisson',[
            'title'=>'add permisson',
            'user'=>$user,
            'permisson'=>$permisson,
            'name_role'=>$name_role,
            'get_per'=>$get_per,
        ]);
    }

    public function insertpermisson(Request $request,$id)
    {
        $data = $request->all();
        $user = User::query()->find($id);
        $role_id=$user->roles->first()->id;
        $role = Role::findById($role_id);
        //trao quyen
        $role->syncPermissions($data['permisson']);

        Session::flash('success','cap nhat permisson thanh cong');

        return redirect()->back();
    }
}
