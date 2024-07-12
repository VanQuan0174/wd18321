<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// GET ::: POST => Method HTTP 

Route::get('/',function(){
    echo 'Trang chủ';
});
Route::get('/test',function(){
    echo '123456';
});
Route::get('/list-user',[UserController::class, 'showUser']);
 //Param và Slug

 //Param 
 // http://127.0.0.1:8000/update-user?id=1
 Route::get('/update-user',[UserController::class, 'updateUser']);


 // Slug 
 // http://127.0.0.1:8000/list-user/1/a/b/c
Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);


Route::get('/thong-tin-sinh-vien',[UserController::class, 'sinhVien']);

//http://127.0.0.1:8000/users/add-users

Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
    Route::get('list-users',[UserController::class, 'listUsers'])->name('listUsers');

    Route::get('add-user',[UserController::class, 'addUser'])->name('addUser');
    Route::post('add-user',[UserController::class, 'addPostUser'])->name('addPostUser');

    Route::get('delete-user/{idUser}',[UserController::class, 'deleteUser'])->name('deleteUser'); 

    Route::get('edit-user/{idUser}',[UserController::class, 'editUser'])->name('editUser');
    Route::put('update-user/{idUser}', [UserController::class, 'updateUser'])->name('updateUser');
});


Route::group(['prefix' => 'products', 'as' =>'products.'], function(){
    Route::get('list-prodcts',[ProductController::class, 'listProducts'])->name('listProduct');

    Route::get('add-product',[ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product',[ProductController::class, 'addPostProduct'])->name('addPostProduct');

    Route::get('delete-product/{idProdcut}',[ProductController::class, 'deleteProduct'])->name('deleteProduct'); 

    Route::get('edit-product/{idProdcut}',[ProductController::class, 'editProduct'])->name('editProduct'); 
    Route::put('edit-product',[ProductController::class, 'updateProduct'])->name('updateProduct'); 

    Route::get('/search', [ProductController::class, 'search'])->name('search');


});