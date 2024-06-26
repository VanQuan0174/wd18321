<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Mã Sinh viên</th>
                <th>Chuyên Ngành</th>
                <th>Quê quán</th>
                <th>Ngày sinh</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $sv['hoten']?></td>
                <td><?= $sv['masv']?></td>
                <td><?= $sv['nganh']?></td>
                <td><?= $sv['quequan']?></td>
                <td><?= $sv['ngaysinh']?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>