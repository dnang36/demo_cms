<?php

namespace App\Http\Controllers;

use App\Models\admin\article;
use App\Models\admin\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::query()->limit(5)->get();
        $query = article::query();
        $user = User::query()->first();

        if ($category = $request->get('category')){
            $query->where('category_id',$category);
        }

        $articles = $query->orderByDesc('id')->limit(10)->get();

        return view('client.layouts.master',[
            'title'=>'Trang Chu',
            'categories'=>$categories,
            'articles'=>$articles,
            'users'=>$user,
        ]);
    }

    public function login()
    {
        return view('client.auth.login',[
            'title'=>'dang nhap',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'bail',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
        {
            return redirect()->route('main.index');
        }

        Session::flash('error','email hoac mk sai r');
        return redirect()->back();
    }

    public function detail(article $article)
    {
        $category = category::query()->where('parent_id','id')->get();
        $user = User::query()->get()->first();
//        dd($article->category_id);
        $article_list = article::where('category_id',$article->category_id)->orderByDesc('created_at')->limit(3)->get();

        return view('client.layouts.detail',[
            'title'=>'chi tiet',
            'article'=>$article,
            'category'=>$category,
            'users'=>$user,
            'article_list'=>$article_list,
        ]);
    }
}
