<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\article;
use App\Models\admin\category;
use App\Models\admin\tag;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $article = article::query()->count();
        $category = category::query()->count();
        $tag = tag::query()->count();
        $user = User::query()->count();

        return view('admin.dashboard.index',[
            'title'=>'Trang quản trị',
            'articles'=>$article,
            'categories'=>$category,
            'tags'=>$tag,
            'users'=>$user,
        ]);
    }
}
