<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactEmailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\UserController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;
Route::get('/', [IndexController::class,'Index'])->name('trangchu');
Route::get('/san-pham/{title}_{id}', [SanphamController::class,'chitiet'])->name('sp.ct');
Route::get('spdaxem', [SanphamController::class,'Spdaxem'])->name('sp.cookie');
Route::get('logon',[AcountController::class,'Logon'])->name('ac.logon');
Route::get('logout',[AcountController::class,'logout'])->name('ac.logout');
Route::post('dangnhap',[AcountController::class,'Login'])->name('ac.dangnhap');
Route::get('dangky',[AcountController::class,'Dangky'])->name('ac.dk');
Route::post('dangkysave',[AcountController::class,'DangkySave'])->name('ac.dksv');

//Khách hàng
Route::get('kh-dangky',[KhachhangController::class,'dangky'])->name('kh.dk');
Route::post('kh-dangky',[KhachhangController::class,'luudangky'])->name('khluu.dk');
Route::get('kh-dangnhap',[KhachhangController::class,'dangnhap'])->name('kh.dn');
Route::post('kh-dangnhap',[KhachhangController::class,'postdangnhap'])->name('kh.postdn');

Route::resource('User',UserController::class);
Route::post('User/logon',[UserController::class,'logon']);

Route::prefix('cart')->group(function(){
    Route::get('them-hang/{id}',[CartController::class,'Themhang'])->name('cart.them');
    Route::get('xoa-hang/{id}',[CartController::class,'Xoahang'])->name('cart.xoa');
    Route::get('cap-nhat/{id}',[CartController::class,'Capnhathang'])->name('cart.capnhat');
    Route::get('danh-sach',[CartController::class,'Viewcart'])->name('cart.view');
    Route::get('huybo',[CartController::class,'Huyhang'])->name('cart.huy');
});

Route::get('send/mail',function(){
    $name="Nguyễn Khắc Sơn";
    $Mess="Xin chào nhé";
    $mail="bkapinside@gmail.com";
    Mail::to('sonnk@bachkhoa-aptech.edu.vn')->send(new ContactMail($mail, $name,$Mess));
    echo('Gửi mail thành công');
});
Route::get('lienhe',[ContactEmailController::class,'index'])->name('lienhe');
Route::post('sendmail',[ContactEmailController::class,'send_contact'])->name('send_contact');
Route::prefix('admin')->middleware('auth')->group(function(){
Route::get('/', function () {
    $tendangnhap="son";
    return view('AdminMaster',compact('tendangnhap'));
});

Route::prefix('Category')->group(function(){
    // Route::get('danh-sach',[CateController::class,'Index'])->name('cate.dscate');
    Route::get("/list",[CategoryController::class,'index'])->name('cate.index');
    Route::get('/add',[CategoryController::class,'Add'])->name('cate.Add');
    Route::post('/insert',[CategoryController::class,'Insert'])->name('cate.Insert');
    Route::get('/edit/{Id}',[CategoryController::class,'edit'])->name('cate.edit');
    Route::put('/update/{Id}',[CategoryController::class,'update'])->name('cate.update');
    Route::delete('/delete/{Id}',[CategoryController::class,'delete'])->name('cate.delete');
});
Route::prefix('Product')->group(function(){
    Route::get('list',[SanphamController::class,'index'])->name('index');
    Route::get('add',[SanphamController::class,'add'])->name('add');
    Route::post('save',[SanphamController::class,'save'])->name('save');
    Route::delete('delete/{Id}',[SanphamController::class,'delete'])->name('delete');
    Route::get('edit/{Id}',[SanphamController::class,'edit'])->name('edit');
    Route::put('update/{Id}',[SanphamController::class,'update'])->name('update');
    Route::get('Themmoi',[SanphamController::class,'Themmoi'])->name('Themmoi');
    Route::get('Themanh/{proid}',[SanphamController::class,'Themanh'])->name('Themanh');
    Route::post('Luuanhsanpham',[SanphamController::class,'Luuanhsanpham'])->name('luuanhsanpham');
    Route::delete('xoaanh/{Id}',[SanphamController::class,'xoaanh'])->name('xoaanh');
});
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

