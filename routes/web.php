<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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
