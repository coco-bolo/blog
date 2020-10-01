<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input['password'] = md5($input['password']);

        $res = User::create($input);

        if ($res) {
            return redirect(url('user/index'));
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $input = $request->except(['_token']);

        // dd($input);
        $res = User::find($input['id'])->update([
            'username' => $input['username'],
            'password' => md5($input['password']),
        ]);

        if ($res) {
            return redirect(url('user/index'));
        } else {
            return back();
        }
    }

    public function del($id) {
        $user = User::find($id);
        $res = $user->delete();

        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 0,
                'msg' => '删除失败'
            ];
        }

        return $data;
    }
}
