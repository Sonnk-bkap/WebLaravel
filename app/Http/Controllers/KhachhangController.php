<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class KhachhangController extends Controller
{
    //
    public function dangky()
    {
        return view('Khachhang.frmKHDK');
    }
    public function luudangky(Request $request)
    {
        $email=$request->email;
        $password=bcrypt($request->pass);
        $fulname=$request->name;
        $username=$email;
        $phone=$request->phone;
        $Active=1;

        $kh=Khachhang::create([
            'email'=>$email,
            'username'=>$username,
            'fulname'=>$fulname,
            'password'=>$password,
            'phone'=>$phone,
            'Active'=>$Active
        ]);
        return redirect()->route('kh.dn');
    }
    public function dangnhap()
    {
        return view('Khachhang.frmKHDN');
    }
     public function postdangnhap(Request $request)
    {
        $email=$request->email;
        $password=$request->pass;
        $data=[
            'email'=>$email,
            'password'=> $password
        ];
        $check_login=Auth::guard('kh')->attempt($data);
        //dd($data);
        if($check_login)
        {
            return redirect()->route('trangchu');
        }
        else
        {
            return 'Lỗi không đăng nhập được';
        }
        try{
            //code lệnh;
            
        }
        catch (Exception $exception){
            //Thông báo lỗi
        }
    }
}
