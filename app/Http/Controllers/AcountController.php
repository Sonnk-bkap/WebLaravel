<?php

namespace App\Http\Controllers;

use App\Models\Acount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcountController extends Controller
{
    //
    public function Logon()
    {
        return view('logon');
    }
     public function logout()
    {
        session(['ac'=>null]);
        session(['username'=>null]);
        Auth::guard('ac')->logout();
        return view('logon');
    }
    public function Login(Request $request)
    {
        $username=$request['username'];
        $pass=$request['pass'];
        $data=[
            'username'=>$username,
            'password'=> $pass
        ];
        // dd (bcrypt(123456));
        // dd ($data);
        //$checklogin=Acount::where('username','=',$username)->where('pass','=',$pass)->first();
        $checklogin=Auth::guard('ac')->attempt($data);
        if($checklogin)
        {
            session(['ac'=>$data]);
            session(['username'=>$data['username']]);
            return redirect()->route('trangchu');
        }
        else{
            
            return redirect()->back();
        }
    }
    public function Dangky()
    {
        return view('dangkyTk');
    }
    public function DangkySave(Request $request)
    {
        $username=$request['username'];
        $pass=$request['pass'];
        $fullname=$request['fullname'];
        $phone=$request['phone'];
        $email=$request['email'];
        $active=1;
        Acount::insert(
            [
                'username'=>$username,
                'password'=> bcrypt($pass),
                'fulname'=>$fullname,
                'phone'=>$phone,
                'email'=>$email,
                'Active'=>$active
            ]
            );
      
        return redirect()->route('trangchu')->with('flash ok','Đăng ký thành công');
    }
}
