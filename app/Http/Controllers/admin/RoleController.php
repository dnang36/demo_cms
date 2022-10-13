<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\permisson;
use App\Models\admin\roles;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(Request $request)
    {
//        Role::create(['name'=>'testt']);
        $search = $request->get('q');

        $roles = roles::query()->where('name','like','%'.$search.'%')->paginate(5);

        return view('admin.role.index',[
            'title'=>'role list',
            'search'=>$search,
            'role'=>$roles,
        ]);
    }

    public function create()
    {
        $permissons = permisson::query()->get();

        return view('admin.role.create',[
            'title'=>'add role',
            'permisson'=>$permissons,
        ]);
    }


    public function store(Request $request)
    {
        $name = $request->get('name');
        Role::create(['name'=>$name]);

        Session::flash('success','them vai tro thanh cong');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit(roles $role)
    {

        $permissons = permisson::query()->get();

        return view('admin.role.edit',[
            'title'=>'edit role',
            'roles'=>$role,
            'permisson'=>$permissons,
        ]);
    }

    public function update(Request $request, roles $role)
    {
        $role->name=$request->get('name');
        $role->save();

        Session::flash('success','cap nhat quyen thanh cong');
        return redirect()->back();
    }


    public function destroy(roles $role)
    {
        $role->delete();

        return redirect()->back();
    }
}
