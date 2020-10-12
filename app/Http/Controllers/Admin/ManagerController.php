<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $managers = Manager::all();

        return view('admin.manager.list', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.manager.add', compact('roles'));
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
        // dd($input);

        $manager = Manager::create([
            'name' => $input['name'],
            'pass' => Crypt::encrypt($input['pass']),
            'tel' => $input['tel'],
            'email' => $input['email'],
        ]);

        if (isset($input['ids']) && !empty($input['ids'])) {
            $manager->role()->attach($input['ids']);
        }

        // if ($res) {
            $data = ['status' => 1, 'msg' => '添加成功'];
        // } else {
            // $data = ['status' => 0, 'msg' => '添加成功'];
        // }
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
        $manager = Manager::find($id);
        $roles= Role::all();
        $role_ids = [];
        foreach ($manager->role as $role) {
            $role_ids[] = $role->id;
        }

        return view('admin.manager.edit', compact('manager', 'roles', 'role_ids'));
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
        $input = $request->all();
        // dd(isset($input['ids']));
        // dd(isset($input['ids']));
   
        $manager = Manager::find($id);
        Manager::where('id', $id)->update([
            'name' => $input['name'],
            'tel' => $input['tel'],
            'email' => $input['email'],
        ]);

        if (isset($input['ids']) && !empty($input['ids'])) {
            $manager->role()->sync($input['ids']);
        } else {
            $manager->role()->detach();
        }

        // if ($res) {
            $data = ['status' => 1, 'msg' => '修改成功'];
        // } else {
            // $data = ['status' => 0, 'msg' => '修改失败'];
        // }
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
        $manager = Manager::find($id);
        $manager->role()->detach();

        $res = Manager::destroy($id);

        if ($res) {
            $data = ['status' => 1, 'msg' => '已删除'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }
}
