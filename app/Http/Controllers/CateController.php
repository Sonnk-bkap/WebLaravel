<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
    //
    public function Index()
    {
        $cate=DB::table('category')->get();
        //Hiển thị trang danh sách
        return view('category/dscate',compact('cate'));
    }
}
