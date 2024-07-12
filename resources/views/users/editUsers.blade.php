<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
    <form action="{{ route('users.updateUser', ['idUser' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name :</label>
            <input type="text" class="form-control" value="{{$user->name}}" name="nameUser" >
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Emai :</label>
            <input type="text" class="form-control" value="{{$user->email}}" name="emailUser">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phòng ban nhân viên</label>
            <select name="phongbanUser" id="phongban" class="form-select">
                @foreach($phongBan as $value)
                  
                 <option
        
                  @if( $user->phongban_id === $value->id)
                    selected
                  @endif
                  value="{{ $value->id}}">{{$value->ten_donvi}}
                </option>
                @endforeach
            </select>
          </div>

        
        <div class="mb-3">
            <label for="" class="form-label">tuoi:</label>
            <input type="text" class="form-control" value="{{$user->tuoi}}" name="tuoiUser">
        </div>

        <button class="btn btn-success" type="submit">sua</button>
    </form>
</div>
</body>
</html>