<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.role.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission_collection = Permission::where('name', '全部')->first();
        return view('admin.role.add', compact('permission_collection'));
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
        // dd($input['ids']);

        $role = Role::create([
            'rolename' => $input['rolename'],
            'desc' => $input['desc'],
        ]);

        $role->permission()->attach($input['ids']);

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
        $permission_collection = Permission::where('name', '全部')->first();
        $role = Role::find($id);
        $per_ids = [];
        foreach ($role->permission as $perm) {
            $per_ids[] = $perm->id;
        }

        return view('admin.role.edit', compact('role', 'per_ids', 'permission_collection'));
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
        // dd($request->all());
        // dd($id);
   
        $role = Role::find($id);
        Role::where('id', $id)->update([
            'rolename' => $request->input('rolename'),
            'desc' => $request->input('desc'),
        ]);
        // dd($role);
        $role->permission()->sync($request->input('ids'));

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
        $role = Role::find($id);
        $role->permission()->detach();

        $res = Role::destroy($id);

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
        $res = Role::destroy($request->get('ids'));

        if ($res) {
            $data = ['status' => 1, 'msg' => '已删除'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        // 返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    public function aaa()
    {

        // 批量构建树
        $permissions = [
            ['id' => 1, 'name' => '全部', 'children' => [
                ['id' => 2, 'name' => '用户管理', 'children' => [
                    ['id' => 3, 'name' => '用户列表'],
                    ['id' => 4, 'name' => '用户添加'],
                    ['id' => 5, 'name' => '用户修改'],
                    ['id' => 6, 'name' => '用户删除']
                ]],
                ['id' => 7, 'name' => '文章管理', 'children' => [
                    ['id' => 8, 'name' => '文章列表'],
                    ['id' => 9, 'name' => '文章添加'],
                    ['id' => 10, 'name' => '文章修改'],
                    ['id' => 11, 'name' => '文章删除'],
                    ['id' => 12, 'name' => '文章停用'],
                ]],
            ]]
        ];

        Permission::buildTree($permissions);
    }
}
