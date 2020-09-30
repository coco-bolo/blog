<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户展示页面</title>
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
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td><a href="/user/edit/{{$user->id}}">修改</a> | <a href="#">删除</a></td>
        </tr>
        @endforeach
    </table>
</body>

</html>