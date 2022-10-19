<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tag\StoreRequest;
use App\Models\admin\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $tag = tag::query()->where('name','like','%'.$search.'%')->paginate(5);

        return view('admin.tag.index',[
            'title'=>'list tag',
            'tag'=>$tag,
            'search'=>$search
        ]);
    }

    public function create()
    {
        return view('admin.tag.create',[
            'title'=>'Add tag',
        ]);
    }

    public function store(StoreRequest $request)
    {
        $tag = new tag();
        $tag->fill($request->except('_token'));
        $tag->save();

        Session::flash('success','tạo tag mới thành công');

        return redirect()->back();
    }

    public function edit(tag $tag)
    {
        return view('admin.tag.edit',[
            'title'=>'edit tag',
            'tag'=>$tag,
        ]);
    }

    public function update(StoreRequest $request, tag $tag)
    {
        $tag->update($request->except('_token'));
        Session::flash('success','Sửa thành công');

        return redirect()->back();
    }

    public function destroy(tag $tag)
    {
        $tag->delete();

        return redirect()->back();
    }
}
