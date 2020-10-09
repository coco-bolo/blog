<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $users = User::orderBy('id')
                     ->where('username', 'like', '%' . $request->input('username') . '%')
                     ->where('username', 'like', '%' . $request->input('email')  . '%')
                     ->paginate($request->input('num') ?: 3);
        // $users = User::paginate(3);
        return view('admin.user.list', compact('users', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $res = User::create([
            'email' => $input['email'],
            'username' => $input['username'],
            'password' => Crypt::encrypt($input['pass']),
        ]);

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
        //
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
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
        //
        $user = User::find($id);
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $res = $user->save();

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
        //
        $res = User::destroy($id);

        if ($res) {
            $data = ['status' => 1, 'msg' => '已删除'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    public function delAll(Request $request)
    {
        $res = User::destroy($request->get('ids'));

        if ($res) {
            $data = ['status' => 1, 'msg' => '已删除'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        // 返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }
}
