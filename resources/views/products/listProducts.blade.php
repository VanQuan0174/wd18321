<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Form tìm kiếm sản phẩm -->
            <form action="{{ route('products.search') }}" method="get" class="form-inline my-3">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="query" class="form-control" placeholder="Nhập tên sản phẩm để tìm kiếm" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
            </form>
            
            <!-- Kiểm tra và hiển thị kết quả tìm kiếm -->
            @if(isset($products))
                <h2>Kết quả tìm kiếm</h2>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Số lượt xem</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category_name }}</td> <!-- Cần cập nhật để lấy tên danh mục từ quan hệ nếu có -->
                                <td>{{ $product->view }}</td>
                                <td>
                                    <a href="{{ route('products.deleteProduct', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                                    <a href="{{ route('products.editProduct', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('products.listProduct') }}" class="btn btn-success my-3">Danh sách sản phẩm</a>
            @else
                <!-- Hiển thị danh sách sản phẩm -->
                <h2>Danh sách sản phẩm</h2>
                <a href="{{ route('products.addProduct') }}" class="btn btn-success my-3">Thêm sản phẩm</a>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Số lượt xem</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listProduct as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category_name }}</td> <!-- Cần cập nhật để lấy tên danh mục từ quan hệ nếu có -->
                            <td>{{ $item->view }}</td>
                            <td>
                                <a href="{{ route('products.deleteProduct', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                                <a href="{{ route('products.editProduct', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    
        <!-- Link to Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    
</html>