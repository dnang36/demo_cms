<?php

namespace App\Http\Controllers;

use App\Models\admin\article;
use App\Models\admin\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::query()->limit(5)->get();
        $articles = article::query()->limit(10)->orderByDesc('id')->get();

        return view('client.layouts.master',[
            'title'=>'Trang Chu',
            'categories'=>$categories,
            'articles'=>$articles,
        ]);
    }
}
