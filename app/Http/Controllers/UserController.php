<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser(){
        $users = [
            [
                'id' => '1',
                'name'=> 'quan'
            ],
            [
                'id' => '2',
                'name' => 'quan23'
            ] 
        ];
        return view('list-user')->with([
            'users' => $users
        ]);
    }

    function sinhVien(){
        $sv = [
                'hoten' => 'Nguyễn Văn Quân',
                'nganh' => 'Lập trình web',
                'masv'  => 'PH36493',
                'quequan' => 'Mê Linh-Hà Nội',
                'ngaysinh' => '01/07/2004',
            ];
        return view('thong-tin-sv')->with([
            'sv'=> $sv 
        ]);
    }
    function getUser($id,$name = ''){
        echo $id ;
        echo $name ;
    }
    function updateUser(Request $request){
        echo $request->id;
    }
}
