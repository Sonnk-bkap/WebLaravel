@extends('AdminMaster')
@section('main')

<h1>Danh sách Loại sản phẩm</h1>
<a href="#"class='btn btn-primary'>Thêm mới</a>
 <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cate as $row)
      <tr>
        <td>{{$row->Id}}</td>
        <td>{{$row->CateName}}</td>
        <td>
            <a href="#" class='btn btn-info'>Sua</a>
            <a href="#" class='btn btn-danger'>Xoa</a>
        </td>
      </tr>
         @endforeach
    </tbody>
  </table>

  @stop