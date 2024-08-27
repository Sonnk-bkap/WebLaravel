@extends('AdminMaster')
@section('tieude')
Danh sách sản phẩm
@endsection
@section('main')

<div class="container-fluid">
  <h2>DANH SÁCH SẢN PHẨM</h2>
<form action="{{route('index','CategoryId')}}">
    <label for="sel1" class="form-label">Nhóm sản phẩm:</label>
     <select name="CategoryId" onchange="forms[0].submit()">
            <option value="0">Chọn</option>
            @foreach ($cate as $cat)
                <option value="{{$cat->Id}}">{{$cat->CateName}}</option>
            @endforeach
      </select>
</form>
<a href="add"class="btn btn-primary">Thêm mới</a>
 
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Giá sản phẩm</th>
        <th>Tên nhóm</th>
        <th>Hình ảnh</th>
        <th>Hiển thị</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pro as $row)
      
    <tr>
        <td>{{$row->Id}}</td>
       <td>{{$row->ProName}}</td>
        <td>{{$row->Description}}</td>
        <td>{{$row->Price}}</td>
        <td>{{$row->cate->CateName}}</td>
        <td><img src="{{$row->Images}}" width="100px"></td>
        <td>{{$row->Active}}</td>
        <td>
            <form action="{{route('delete',$row->Id)}}" method="post">
            <a href="{{route('edit',$row->Id)}}"class="btn btn-info">Sửa</a>
            <button type="submit" class="btn btn-danger">Xóa</button>
            @method('DELETE')
            @csrf
            </form>
            <a href="{{route('Themanh',$row->Id)}}" class="btn btn-success">Thêm ảnh</a>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
</div>


@stop