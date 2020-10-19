<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::with('category')
            ->where('title', 'like', '%' . $request->input('title') . '%')
            ->where('editor', 'like', '%' . $request->input('editor')  . '%')
            ->where('tag', 'like', '%' . $request->input('tag')  . '%')
            ->orderBy('id')
            ->paginate($request->input('num') ?: 3);
        // dd($articles);

        return view('admin.article.list', compact('articles', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.add');
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

        $res = Article::create([
            'title' => $input['title'],
            'editor' => $input['editor'],
            'tag' => $input['tag'],
            'thumb' => $input['thumb'],
            'desc' => $input['desc'],
            'content' => htmlspecialchars($input['content']),
            'category_id' => 9,
            'isRecommend' => 0,
        ]);

        if ($res) {
            $data = ['status' => 1, 'msg' => '添加成功'];
        } else {
            $data = ['status' => 0, 'msg' => '添加失败'];
        }

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
        $article = Article::find($id);
        $article->content = htmlspecialchars_decode($article->content);
        // dd($article);

        return view('admin.article.edit', compact('article'));
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

        $res = Article::where('id', $id)->update([
            'title' => $input['title'],
            'editor' => $input['editor'],
            'tag' => $input['tag'],
            'thumb' => $input['thumb'],
            'desc' => $input['desc'],
            'content' => htmlspecialchars($input['content']),
            'category_id' => 9
        ]);

        if ($res) {
            $data = ['status' => 1, 'msg' => '修改成功'];
        } else {
            $data = ['status' => 0, 'msg' => '修改失败'];
        }

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
        $res = Article::destroy($id);

        if ($res) {
            $data = ['status' => 1, 'msg' => '删除成功'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }

        return $data;
    }

    public function thumbUpload(Request $request)
    {
        $file = $request->file('file');
        // dd($file->getRealPath());
        if (!$file->isValid()) {
            return ['code' => 1, 'msg' => '无效的上传文件'];
        }

        $extension = $file->extension();
        $new_file = md5(mt_rand(1000, 9999) . time()) . '.' . $extension;

        $img = Image::make($file->getRealPath())->fit(100)->stream();
        // $img = Image::make($file->getRealPath())->resize(200, 200)->save('images/a.jpg');
        // $img = Image::make($file->getRealPath())->stream();
        // $path = $img->basePath();
        // dd(gettype($img->getCore()));
        $disk = Storage::disk('qiniu');

        $res = $disk->put('images/' . $new_file, $img);
        // $disk->putFile('images', new File('/path/to/photo'), 'public');
        // dd($res);
        // create a file
        // $path = $disk->put('', );
        // $path = $disk->put('', $file);
        // dd($path);
        // $path = $file->store('public/images');

        if (!$res) {
            return ['code' => 1, 'msg' => '上传文件失败'];
        }

        return [
            'code' => 0,
            'msg' => '上传文件成功',
            'data' => [
                'path' => 'images/' . $new_file,
                // 'thumb_url' => Storage::url($path)
            ]
        ];

        // $extension = $request->file->extension();
        // $new_file = md5(mt_rand(1000,9999).time()).'.'.$extension;
        // $path = public_path('uploads');
        // $file->move($path, $new_file);
    }

    public function imgUpload(Request $request)
    {
        $files = $request->file();
        $data = [];

        foreach ($files as $file) {
            if (!$file->isValid()) {
                return ['errno' => 1, 'msg' => '无效的上传文件'];
            }

            $extension = $file->extension();
            $new_file = md5(mt_rand(1000, 9999) . time()) . '.' . $extension;

            $img = Image::make($file->getRealPath())->stream();
            $disk = Storage::disk('qiniu');

            $res = $disk->put('images/' . $new_file, $img);

            if (!$res) {
                return ['errno' => 1, 'msg' => '上传文件失败'];
            }

            $data[] = 'images/' . $new_file;
        }

        return [
            'errno' => 0,
            'msg' => '上传文件成功',
            'data' => $data
            // 'data' => [
            //     'images/' . $new_file,
            // ]
        ];
    }
}
