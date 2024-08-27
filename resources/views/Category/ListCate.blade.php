@extends('AdminMaster')
@section('main')
   
    <div class="container-fluid">
    <h2>Danh sách Danh mục loại sản phẩm</h2>
    <a href="{{route('cate.Add')}}"class="btn btn-primary">Thêm mới</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Thứ tự</th>
            <th>Hiển thị</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cate as $row)
        <tr>
            <td>{{$row->Id}}</td>
            <td>{{$row->CateName}}</td>
            <td>{{$row->Ord}}</td>
             <td>{{$row->Active==1?"Hiện":"Ẩn"}}</td>
              <td>
                    <form action="{{route('cate.delete',$row->Id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        <a href="{{route('cate.edit',$row->Id)}}"class="btn btn-info">Sửa</a>
                    </form>
                    
              </td>
        </tr>
          @endforeach
        </tbody>
    </table>
    {{$cate->links()}}
    </div>
@stop