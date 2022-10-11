<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\article;
use App\Models\admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $category = category::query()->get();

        $article = article::query()->where('title','like','%'.$search.'%')->orderByDesc('id')->paginate(5);

//        $article1 = article::query()->where('category_id','=e','%'.$search.'%')->orderByDesc('id')->paginate(5);

        return view('admin.article.index',[
            'title'=>'article list',
            'search'=>$search,
            'article'=>$article,
            'category'=>$category,
        ]);
    }

    public function create()
    {
        $category = category::query()->get();

        return view('admin.article.create',[
            'title'=>'add article',
            'category'=>$category,
        ]);
    }

    public function store(Request $request)
    {
        $article = new article();
        $article->fill($request->except('_token'));
        $article->save();

        Session::flash('success','them thanh cong');

        return redirect()->back();
    }

    public function destroy(article $article)
    {
        $article->delete();

        return redirect()->back();
    }

    public function edit(article $article)
    {
        $category = category::query()->where('parent_id','id')->get();

        return view('admin.article.edit',[
            'title'=>'edit article',
            'article'=>$article,
            'category'=>$category
        ]);
    }

    public function update(Request $request,article $article)
    {
        $article->update($request->except('_token'));

        Session::flash('success','sua thanh cong');

        return redirect()->back();
    }
}
