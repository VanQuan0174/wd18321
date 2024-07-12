<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function listProducts(){
        $listProduct = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        ->select('product.id','product.name','product.price','category.name as category_name','product.view')
        ->orderBy('view', 'desc')
        ->get();

        return view('products/listProducts')->with([
            'listProduct' => $listProduct 
        ]);

    }

    function addProduct(){
        $category = DB::table('category')->select('id','name')->get();
        return view('products/addProduct')->with([
            'category' => $category 
        ]);
    }

    public function addPostProduct(Request $req){
        $data =  [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'category_id' => $req->categoryProduct,
            'view' => $req->viewProduct,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        
        return redirect()->route('products.listProduct');
    }

    
    public function deleteProduct($idProduct){
        DB::table('product')->where('id','=',$idProduct)->delete();
        return redirect()->route('products.listProduct');
    }

    public function editProduct($idProduct){
        $product = DB::table('product')->where('id','=',$idProduct)->first();
        $category = DB::table('category')->select('id','name')->get();
        return view('products.editProduct')->with([
            'product' => $product,
            'category' => $category
        ]);
    }

    public function updateProduct(Request $req){
        $data = [
            'name' => $req->nameProduct,
            'price' =>$req->priceProduct,
            'category_id' =>$req->categoryProduct,
            'view' => $req->viewProduct,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $req->id)->update($data);
        return redirect()->route('products.listProduct');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $products = DB::table('product')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->select('product.id', 'product.name', 'product.price', 'category.name as category_name', 'product.view')
        ->where('product.name', 'LIKE', "%{$query}%")
        ->get();

        return view('products.listProducts')->with([
            'products' =>$products
        ]);
    }
    
}
?>