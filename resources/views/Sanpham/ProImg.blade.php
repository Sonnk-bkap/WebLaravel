@extends('AdminMaster')
@section('main')
<div class="container">
  <h2>Thêm ảnh cho sản phẩm</h2>
  <h3>
        {{$tensp}}
  </h3>
    <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Hình ảnh</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
         @foreach ($proImg as $row)
        <tr>
            <td>
                <img src="{{$row->ImgUrl}}" width="100">
            </td>
            <td>
                <form action="{{route('xoaanh',$row->Id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
            
    </tbody>
    </table>
    <form action="{{route('luuanhsanpham')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{$proid}}" name="proid">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Hình ảnh:</label>
        <input type="file" name="Img">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu ảnh</button>
    <a href="{{route('index')}}"class="btn btn-primary">Trở lại</a>
    @csrf
    </form>
</div>
@stop