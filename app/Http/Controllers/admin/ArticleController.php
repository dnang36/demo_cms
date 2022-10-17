<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\article;
use App\Models\admin\category;
use App\Models\admin\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $categories = category::query()->get();
        $tags = tag::query()->get();
        $query = article::query();

        if ($category = $request->get('category')) {
            $query->where('category_id', $category);
        }

        if ($tag = $request->get('tag')){
            $query->where('tag_id',$tag);
        }

        if ($search){
            $query->where('title','like','%'.$search.'%');
        }

        $article = $query->orderByDesc('id')->paginate(5);
//        $article1 = article::query()->where('category_id','=e','%'.$search.'%')->orderByDesc('id')->paginate(5);

        return view('admin.article.index',[
            'title'=>'article list',
            'search'=>$search,
            'article'=>$article,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    public function create()
    {
        $category = category::query()->get();
        $tags = tag::query()->get();

        return view('admin.article.create',[
            'title'=>'add article',
            'category'=>$category,
            'tags'=>$tags,
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
        $tags = tag::query()->get();

        return view('admin.article.edit',[
            'title'=>'edit article',
            'article'=>$article,
            'category'=>$category,
            'tags'=>$tags,
        ]);
    }

    public function update(Request $request,article $article)
    {
        $article->update($request->except('_token'));

        Session::flash('success','sua thanh cong');

        return redirect()->back();
    }
}
