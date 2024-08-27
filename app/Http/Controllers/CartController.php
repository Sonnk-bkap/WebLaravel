<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function Viewcart(Cart $cart)
    {
        return view('cart',compact('cart'));
    }
    public function Themhang($id,Cart $cart)
    {
        $pro =Product::find($id);
        $cart->Add($pro);
        //dd($cart);
        return redirect()->route('cart.view');
    }
    public function Huyhang(Cart $cart)
    {
        $cart->Clear();
        return redirect()->route('trangchu');
    }
    public function Capnhathang($id,Cart $cart)
    {
        $sl=request('soluong',1);
        $sl=$sl>0?$sl:1;
        $cart->Update($id,$sl);
        return redirect()->route('cart.view');
    }
    public function Xoahang($id,Cart $cart)
    {
        $cart->Delete($id);
        return redirect()->route('cart.view');
    }
}
