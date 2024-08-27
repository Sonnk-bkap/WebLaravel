<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AcountMiddleware;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function Index()
    {
        // if(!Auth::guard('ac')->check())
        // {
        //     return redirect()->route('ac.logon');
        // }
        $sp=Product::all();
        return view('Index',compact('sp'));
    }
}
