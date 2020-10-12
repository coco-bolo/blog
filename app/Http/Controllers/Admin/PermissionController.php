<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permission_collection = Permission::where('name', '全部')->first();

        // $permissions = $node->getLeaves();
        // print_r($res);die;

        return view('admin.permission.list', compact('permission_collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $route = Route::current()->getActionName();
        // dd($route);
        $perm_cates = Permission::where('parent_id', 1)->get();

        return view('admin.permission.add', compact('perm_cates'));
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

        $res = Permission::create([
            'parent_id' => $input['parent_id'],
            'name' => $input['name'],
            'url' => $input['url'],
        ]);

        Permission::rebuild();

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
        $permission = Permission::find($id);
        $perm_cates = Permission::where('parent_id', 1)->get();

        return view('admin.permission.edit', compact('perm_cates', 'permission'));
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
        // dd($input);

        $res = Permission::where('id', $id)->update([
            'parent_id' => $input['parent_id'],
            'name' => $input['name'],
            'url' => $input['url'],
        ]);

        Permission::rebuild();

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
        // $arr = [];
        $roles = Role::all();
        foreach ($roles as $role) {
            // print_r($role->permission);
            foreach ($role->permission as $perm) {
                if ($perm->id == $id) {
                    $data = ['status' => 0, 'msg' => '尚有角色拥有此权限，不能删除！如要删除，请取消相关角色权限'];
                    return $data;
                    // $arr[] = $id; 
                }
            }
        }
        // print_r($arr);
        // die;

        $res = Permission::destroy($id);

        Permission::rebuild();

        if ($res) {
            $data = ['status' => 1, 'msg' => '删除成功'];
        } else {
            $data = ['status' => 0, 'msg' => '删除失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }

    public function createNode()
    {
        return view('admin.permission.nodeAdd');
    }

    public function storeNode(Request $request)
    {
        $input = $request->all();

        $res = Permission::create([
            // 父级ID为1暂时写死（暂未找到更泛用的解决方案）
            'parent_id' => 1,
            'name' => $input['name'],
        ]);

        Permission::rebuild();

        if ($res) {
            $data = ['status' => 1, 'msg' => '添加成功'];
        } else {
            $data = ['status' => 0, 'msg' => '添加失败'];
        }
        //返回数据无需json_encode，laravel底层已自动处理
        return $data;
    }
}
