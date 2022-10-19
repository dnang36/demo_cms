<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tag\StoreRequest;
use App\Models\admin\permisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissonController extends Controller
{
    public function index(Request $request)
    {
//        Permission::create(['name'=>'testtt']);
        $search = $request->get('q');
        $permisson = permisson::query()->where('name','like','%'.$search.'%')->paginate(5);


        return view('admin.permisson.index',[
            'title'=>'permisson list',
            'permissons'=>$permisson,
            'search'=>$search
        ]);
    }

    public function create()
    {
        return view('admin.permisson.create',[
            'title'=>'add permisson'
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');

        Permission::create(['name'=>$name]);

        Session::flash('success','them quyen thanh cong');

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit(permisson $permisson)
    {
        return view('admin.permisson.edit',[
            'title'=>'edit permisson',
            'permissons'=>$permisson
        ]);
    }


    public function update(Request $request, permisson $permisson)
    {
        $permisson->name=$request->get('name');
        $permisson->save();

        Session::flash('success','cap nhat quyen thanh cong');

        return redirect()->back();
    }


    public function destroy(permisson $permisson)
    {
        $permisson->delete();

        return redirect()->back();
    }
}
