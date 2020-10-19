<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        $category_articles = Category::with('article')->where('depth', '<>', 0)->take(5)->get();
        return view('home.index', compact('category_articles'));
    }
}
