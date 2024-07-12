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
    <div class="container mt-5">
        <h1>Thêm mới sản phẩm</h1>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Name :</label>
                <input type="text" class="form-control" id="nameProduct" name="nameProduct" required>
            </div>

            <div class="mb-3">
                <label for="priceProduct" class="form-label">Price :</label>
                <input type="text" class="form-control" id="priceProduct" name="priceProduct" required>
            </div>

            <div class="mb-3">
                <label for="categoryProduct" class="form-label">Category :</label>
                <select class="form-select" id="categoryProduct" name="categoryProduct" required>
                    @foreach($category as $value)
                        <option value="{{ $value->id }}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="viewProduct" class="form-label">View :</label>
                <input type="text" class="form-control" id="viewProduct" name="viewProduct" required>
            </div>

            <button class="btn btn-success" type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
