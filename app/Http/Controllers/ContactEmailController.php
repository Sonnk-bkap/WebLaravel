<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactEmailController extends Controller
{
    //
    public function index()
    {
        return view('mail.Formcontact');
    }
    public function send_contact(Request $req)
    {
        

         $name = $req->hoten;
        $message = $req->noidung;
        //$email = $req->email;
        Mail::send('View_contact',compact('name','message'),function($mail){
            $mail->to('sonnk@bachkhoa-aptech.edu.vn','xin chào');
        });
        // Mail::to('sonnk@bachkhoa-aptech.edu.vn')
        //     ->send(new ContactMail( $email,$name, $message));    
        return redirect()->back()->with('ok','Gửi email thành công');
    }

}
