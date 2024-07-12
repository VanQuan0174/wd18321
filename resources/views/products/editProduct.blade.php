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
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('products.updateProduct') }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Name:</label>
                <input type="text" class="form-control" id="nameProduct" name="nameProduct" value="{{$product->name}}" required>
            </div>

            <div class="mb-3">
                <label for="priceProduct" class="form-label">Price:</label>
                <input type="text" class="form-control" id="priceProduct" name="priceProduct" value="{{$product->price}}" required>
            </div>

            <div class="mb-3">
                <label for="categoryProduct" class="form-label">Category:</label>
                <select name="categoryProduct" id="categoryProduct" class="form-select" required>
                    @foreach($category as $value)
                        <option value="{{ $value->id }}"
                            @if($product->category_id === $value->id) selected @endif>
                            {{$value->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="viewProduct" class="form-label">View:</label>
                <input type="text" class="form-control" id="viewProduct" name="viewProduct" value="{{$product->view}}" required>
            </div>

            <input type="hidden" name="id" value="{{$product->id}}">

            <button class="btn btn-success" type="submit">Sửa</button>
        </form>
    </div>
</body>
</html>
