<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProStoreRequest;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class SanphamController extends Controller
{
    //
    public function index(Request $request)
    {
        // dd(app_path(''));
        $cateid=$request['CategoryId'];
        $cate=DB::table('category')->get();
        if($cateid!=null)
        {
            //$pro=DB::table('product')->where('CategoryId',$cateid)->get();
            $pro=Product::where('CategoryId',$cateid)->get();
        }
        else{
        //$pro=DB::table('product')
        // ->select('product.*','category.CateName as CateName')
        // ->join('category','category.Id','=','product.CategoryId')
        // ->select(DB::raw('count(*) as Tongsp,CategoryId'))
        // ->groupBy('CategoryId')
        //->get();
        $pro=Product::all();
        //dd($pro);
        }
        return view('sanpham/listsp',compact('pro','cate'));
    }
    public function chitiet($title,$id,Request $request)
    {
        $pr=Product::find($id);
        $id_dsdx=$request->cookie('dsdx');
        $dsid=explode(',',$id_dsdx);
        $spdx=Product::whereIn('id',$dsid)->get();
        $respone=new Response(view('chitietsp',compact('pr','spdx')));
       
        if(!($request->cookie('dsdx')))
        {
            //Khởi tạo cookie
            $respone->withCookie(cookie('dsdx',$id,1));
            //echo 'khoi tao thanh cong';
        }
        else{
            //Nếu đã tồn tại cookie
            $strId= $request->cookie('dsdx');
            $strId = $strId.','.$id;
            $respone->withCookie(cookie('dsdx',$strId,1));
        }
        // $str=Request()->cookie('dsdx');
        
        return $respone;
        //return view('chitietsp',compact('pr'));
    }
    public function Spdaxem(Request $request)
    {
        $id_dsdx=$request->cookie('dsdx');
        $dsid=explode(',',$id_dsdx);
        $pr=Product::whereIn('id',$dsid)->get();
        //dd($dsid);
        return view('dsspdaxem',compact('pr'));
    }
    // public function get_cookie(Request $request)
    // {
    //     dd($request->cookie('dsdx'));
    //     return $request->cookie('dsdx');
    // }
    // public function set_cookie($strValue)
    // {
    //     $respone=new Response;
    //     $respone->withCookie('dsdx',$strValue,1);
    //         echo 'khoi tao thanh cong';
    //     return $respone;
    // }
    public function add()
    {
        $cate=DB::table('category')->get();
        return view('sanpham/addsp',compact('cate'));
    }
    public function Themanh($proid)
    {
        $sp=DB::table('product')->find($proid);
        $tensp=$sp->ProName;
        //Lấy ra ds ảnh theo sản phẩm
        $proImg=DB::table('proimages')->where('ProId',$proid)->get();
        return view('sanpham/ProImg',compact('tensp','proid','proImg'));
    }
    public function Luuanhsanpham(Request $request)
    {
        //dd($request);
        $proid=$request['proid'];
       
         //Lấy hình ảnh
        if($request->Img)
        {
            $filename=$request->Img->getClientOriginalName();
            $request->Img->move(public_path('Img'),$filename);
            $ImgUrl='/Img/'.$filename;
        }
        else{
            $ImgUrl="";
        }
        //Lưu vào bảng ProImg
        DB::table('proimages')->insert([
            'ImgUrl'=>$ImgUrl,
            'ProId'=>$proid
        ]);
        //dd($request);
        //Load ra ds
        return redirect()->back();
    }
    public function Xoaanh($Id)
    {
        $img=DB::table('proimages')->where('Id',$Id)->delete();
        return redirect()->back();
    }
    public function save(ProStoreRequest $request)
    {
        $Proname=$request['ProName'];
        $Des=$request['Description'];
        $Price=$request['Price'];
        $Active=$request['Active']=='on'?1:0;
        $CateId=$request['CategoryId'];
        //Lấy hình ảnh
        if($request->Images)
        {
            $filename=$request->Images->getClientOriginalName();
            $request->Images->move(public_path('Img'),$filename);
            $Images='/Img/'.$filename;
        }
        else{
            $Images="";
        }
        DB::table('product')->insert([
            [
                'ProName'=>$Proname,'Description'=>$Des,'Price'=>$Price,'Active'=>$Active,'Images'=>$Images,'CategoryId'=>$CateId
            ]
            ]);
        return redirect()->route('index');
    }
    public function delete(int $Id)
    {
        DB::table('Product')->where('Id',$Id)->delete();
        return redirect()->route('index');
    }
     public function update(int $Id,ProStoreRequest $request)
    {
        $Proname=$request['ProName'];
        $Des=$request['Description'];
        $Price=$request['Price'];
        $Active=$request['Active']=='on'?1:0;
        $CateId=$request['CategoryId'];
        //Lấy hình ảnh
        if($request->Images)
        {
            $filename=$request->Images->getClientOriginalName();
            $request->Images->move(public_path('Img'),$filename);
            $Images='/Img/'.$filename;
        }
        else{
            $Images=$request['imgold'];
        }
        DB::table('product')->where('Id',$Id)->update([
                'ProName'=>$Proname,'Description'=>$Des,'Price'=>$Price,'Active'=>$Active,'Images'=>$Images,'CategoryId'=>$CateId
            ]);
        return redirect()->route('index');
    }
    public function edit(int $Id)
    {
            $cate=DB::table('category')->get();
            $Pro=DB::table('product')->find($Id);
            return view('sanpham/editsp',compact('cate','Pro'));
    }
    public function Themmoi()
    {
        $cate=DB::table('category')->get();
        $brand=DB::table('brand')->get();
        return view('sanpham/themSP',compact('cate','brand'));
    }
}
