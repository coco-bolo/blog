<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Collect;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        $category_articles = Category::with('article')->where('depth', '<>', 0)->take(5)->get();
        return view('home.index', compact('category_articles'));
    }

    public function collect(Request $request)
    {
        $uid = $request->input('uid');
        $article_id = $request->input('article_id');
        $act = $request->input('act');

        switch ($act) {
            case 'add':
                $collect = Collect::where([
                    ['user_id', $uid],
                    ['article_id', $article_id]
                ])->get();
                if ($collect->isEmpty()) {
                    $res = Collect::create([
                        'user_id' => $uid,
                        'article_id' => $article_id
                    ]);
                    Article::where('id', $article_id)->increment('collect');

                    if ($res) {
                        $data = ['status' => 1, 'msg' => '已收藏'];
                    } else {
                        $data = ['status' => 0, 'msg' => '收藏失败'];
                    }
                } else {
                    $data = ['status' => 1, 'msg' => '已收藏'];
                }
                //返回数据无需json_encode，laravel底层已自动处理
                return $data;
                break;
            case 'remove':
                $collect = Collect::where([
                    ['user_id', $uid],
                    ['article_id', $article_id]
                ])->first();
                if (!empty($collect)) {
                    Article::where('id', $article_id)->decrement('collect');
                    $res = $collect->delete();

                    if ($res) {
                        $data = ['status' => 1, 'msg' => '未收藏'];
                    } else {
                        $data = ['status' => 0, 'msg' => '取消收藏失败'];
                    }
                } else {
                    $data = ['status' => 1, 'msg' => '未收藏'];
                }
                //返回数据无需json_encode，laravel底层已自动处理
                return $data;
                break;
            default:
                # code...
                break;
        }
    }
}
