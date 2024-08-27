<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        // $tieude="Vụ ông Donald Trump bị ám sát hụt: Người đàn ông hy sinh khi che chắn cho gia đình";
        // $title=\Str::words($tieude,5);
        // dd($title);
        //$cate=DB::table('category')->get();
        $data=new Category;
        $cate= $data::paginate(2);
        return view('Category/ListCate',compact('cate'));
    }
    public function Add()
    {
        return view('category/addcate');
    }
    public function Insert(CateStoreRequest $request)
    {
        //dd($request);
        $CateName=$request['CateName'];
        $Ord=$request['Ord'];
        $Active=$request['Active']=='on'?1:0;
        // DB::table('category')->insert([
        //     ['CateName'=>$CateName,'Ord'=>$Ord,'Active'=>$Active]
        // ]);
        $cate=new Category;
        $cate->CateName=$CateName;
        $cate->Ord=$Ord;
        $cate->Active=$Active;
        $cate->save();
        return redirect()->route('cate.index');
    }
    public function delete(int $Id)
    {
        //$cate=DB::table('category')->where('Id',$Id)->delete();
        Category::where('Id',$Id)->delete();
        return redirect()->route('cate.index');
    }
    public function edit(int $Id)
    {
        //$cate=DB::table('category')->find($Id);
        
        $cate=Category::find($Id);
        return view('category/editcate',compact('cate'));
    }
    public function update(int $Id,CateStoreRequest $request)
    {

        $CateName=$request['CateName'];
        $Ord=$request['Ord'];
        $Active=$request['Active']=='on'?1:0;
        // DB::table('category')->where('Id',$Id)->update([
        //     'CateName'=>$CateName,'Ord'=>$Ord,'Active'=>$Active
        // ]);
        
        $cate=Category::where('Id',$Id)->update([
            'CateName'=>$CateName,'Ord'=>$Ord,'Active'=>$Active
        ]);
        // $cate->CateName=$CateName;
        // $cate->Ord=$Ord;
        // $cate->Active=$Active;
        // $cate->save();
        // //dd($cate);
        return redirect()->route('cate.index');
    }
}
