<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CommonController extends Controller
{
    public function __construct()
    {
        $top_categories = Category::where('depth', 0)->first()->getSiblingsAndSelf();
        // dd($top_categories);
        view()->share('top_categories', $top_categories);
    }
}
