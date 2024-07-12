<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sach users</title>
</head>
<body>
    <a href="{{ route('users.addUser') }}">them moi</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phong Ban</th>
                <th>Chuc nang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->ten_donvi}}</td>
                <td>
                    <a href="{{ route('users.deleteUser',$item->id) }}">xoa</a>
                    <a href="{{ route('users.editUser',$item->id) }}">sua</a>
                </td>
            </tr>
            @endforeach
         
        </tbody>
    </table>
</body>
</html>