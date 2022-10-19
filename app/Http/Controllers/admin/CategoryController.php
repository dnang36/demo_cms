<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\StoreRequest;
use App\Models\admin\category;
use App\Models\admin\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $cate = category::query()->where('name','like','%'.$search.'%')->orderByDesc('id')->paginate(5);

        return view('admin.category.index',[
            'title'=>'Category list',
            'category'=>$cate,
            'search'=>$search,
        ]);
    }

    public function create()
    {
//        $parent = category::query()->where('parent_id','=',0)->get();
        $parent = category::query()->get();

        return view('admin.category.create',[
            'title'=>'add category',
            'parent'=> $parent,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $category = new category();
        $category->fill($request->except('_token'));
        $category->save();

        Session::flash('success','tạo danh mục thành công');

        return redirect()->back();
    }

    public function edit(category $category)
    {

        $parent = category::query()->where('parent_id','id')->get();

        return view('admin.category.edit',[
            'title'=>'Edit Category',
            'category'=>$category,
            'parent'=> $parent,
        ]);
    }

    public function update(StoreRequest $request, category $category)
    {
        $category->update($request->except('_token'));

        return redirect()->route('category.index');
    }

    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->back();
    }
}
