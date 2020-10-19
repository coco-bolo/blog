<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        // dd($top_categories);
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $top_categories = Category::where('depth', 0)->first()->getSiblingsAndSelf();
        return view('admin.category.add', compact('top_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);

        $res = Category::create([
            'parent_id' => $input['parent_id'] ?? null,
            'name' => $input['name'],
        ]);

        Category::rebuild();

        if ($res) {
            $data = ['status' => 1, 'msg' => '添加成功'];
        } else {
            $data = ['status' => 0, 'msg' => '添加失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $top_categories = Category::where('depth', 0)->first()->getSiblingsAndSelf();
        $category = Category::find($id);

        return view('admin.category.edit', compact('top_categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);

        $res = Category::where('id', $id)->update([
            'parent_id' => $input['parent_id'] ?? null,
            'name' => $input['name'],
        ]);

        Category::rebuild();

        if ($res) {
            $data = ['status' => 1, 'msg' => '修改成功'];
        } else {
            $data = ['status' => 0, 'msg' => '修改失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Category::destroy($id);

        Category::rebuild();

        if ($res) {
            $data = ['status' => 1, 'msg' => '删除成功'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    public function createTop()
    {
        return view('admin.category.addTop');
    }

    public function editTop($id)
    {
        $category = Category::find($id);

        return view('admin.category.editTop', compact('category'));
    }
}
