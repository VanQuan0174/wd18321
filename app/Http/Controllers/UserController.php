<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function showUser(){
        // $users = [
        //     [
        //         'id' => '1',
        //         'name'=> 'quan'
        //     ],
        //     [
        //         'id' => '2',
        //         'name' => 'quan23'
        //     ] 
        // ];
        // return view('list-user')->with([
        //     'users' => $users
        // ]);

        // 1.lấy danh sách toàn bộ user lưu trong mysql (select * from user)
        // $listUsers = DB::table('users')->get();
        // dd($listUsers);

        // 2.lấy thông tin user có id bằng 4 (select * form users where id = 4 ;)
        // $result = DB::table('users')->where('id','=','4')->first();

        // $result = DB::table('users')->find('4'); //find chỉ dùng được khi tìm với điều kiện là id 

        // 3.lấy thuộc tính name của user có id là 16
        // $result = DB::table('users')->where('id','=','16')->value('name');

        //4.Lấy danh sách id user của phòng ban 'Ban giám hiệu'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->pluck('id');

        //5.Tìm user có độ tuổi lớn nhất trong công ty
        // $result =DB::table('users')->where('tuoi','=',DB::table('users')->max('tuoi'))->get();

        //6.Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result =DB::table('users')->where('tuoi','=',DB::table('users')->min('tuoi'))->get();

        //7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->count('id');

        //8.Lấy danh sách tuổi các user
        // $result = DB::table('users')->distinct()->pluck('tuoi');

        //9.Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        //$result = DB::table('users')->where('name','like','%Khải')->orWhere('name','like','%Thanh')->get();

        //10.Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo%')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->select('id','name','email')->get();

        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')->where('tuoi','>=','30')->select('id','name','tuoi','email')->orderBy('tuoi','asc')->get();

        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')->select('id','name','tuoi','email')->orderBy('tuoi','desc')->offset(5)->limit(10)->get();

        // 13. Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Nguyễn Văn Quân',
        //     'email' => 'quannv8786@gmail.com',
        //     'phongban_id' =>'1',
        //     'songaynghi' => '1',
        //     'tuoi' => '20',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];
        // DB::table('users')->insert($data);

        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo%')->value('id');
        // $result = DB::table('users')
        // ->where('phongban_id',$idPhongBan)
        // ->select('id','name','email')
        // ->get();
        // foreach($result as $value){
        //     DB::table('users')->where('id',$value->id)->update([
        //         'name' =>$value->name.' PDT'
        //     ]);
        // }
        // 15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('songaynghi','>','15')->delete();
        // // dd($result);
    }

    // function sinhVien(){
    //     $sv = [
    //             'hoten' => 'Nguyễn Văn Quân',
    //             'nganh' => 'Lập trình web',
    //             'masv'  => 'PH36493',
    //             'quequan' => 'Mê Linh-Hà Nội',
    //             'ngaysinh' => '01/07/2004',
    //         ];
    //     return view('thong-tin-sv')->with([
    //         'sv'=> $sv 
    //     ]);
    // }
    // function getUser($id,$name = ''){
    //     echo $id ;
    //     echo $name ;
    // }
    // function updateUser(Request $request){
    //     echo $request->id;
    // }

    public function listUsers(){
        $listUsers = DB::table('users')
        ->join('phongban','phongban.id','=','users.phongban_id')
        ->select('users.id','users.name','users.email','users.phongban_id','phongban.ten_donvi')
        ->get();
        return view('users/listUsers')->with([
            'listUsers' => $listUsers
        ]);
    } 

    public function addUser(){
        $phongBan = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users/addUsers')->with([
            'phongBan' => $phongBan 
        ]);
    }

    public function addPostUser(Request $req){
        $data =  [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' => $req->phongbanUser,
            'tuoi' => $req->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        
        return redirect()->route('users.listUsers');
    }

    public function deleteUser($idUser){
        DB::table('users')->where('id','=',$idUser)->delete();
        return redirect()->route('users.listUsers');
    }

    public function editUser($idUser){
        $user = DB::table('users')->where('id','=',$idUser)->first();
        $phongBan = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users.editUsers')->with([
            'phongBan' => $phongBan,
            'user' => $user
        ]);
    }

    public function updateUser(Request $req, $idUser){
        DB::table('users')
        ->where('id', $idUser)
        ->update([
            'name' => $req->input('nameUser'),
            'email' => $req->input('emailUser'),
            'phongban_id' => $req->input('phongbanUser'),
            'tuoi' => $req->input('tuoiUser'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    return redirect()->route('users.listUsers', ['id' => $idUser])->with('success', 'User updated successfully!');
}
}

