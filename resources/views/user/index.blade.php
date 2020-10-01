<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户展示页面</title>
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">

</head>

<body>
    <table border="1" cellpadding="5">
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>操作</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td><a href="/user/edit/{{$user->id}}">修改</a> | <a href="javascript:;" onclick="del(this, {{ $user->id }})">删除</a></td>
        </tr>
        @endforeach
    </table>

    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="{{asset('layui/layui.all.js')}}"></script>
    <script>
        window.onload = () => {
            const layer = layui.layer
            del = (obj, id) => {
                layer.confirm('确认删除？', {
                    btn: ['确认', '取消']
                }, () => {
                    $.get('/user/del/' + id, (data) => {
                        if (data.status) {
                            layer.msg(data.msg)
                            $(obj).parents('tr').remove()
                        } else {
                            layer.msg(data.msg)
                        }
                    })
                })
            }
        }
    </script>
</body>

</html>