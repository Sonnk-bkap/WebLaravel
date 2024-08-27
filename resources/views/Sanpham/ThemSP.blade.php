@extends('AdminMaster')
@section('main')

<div class="container mt-3">
  <h2>Thêm mới sản phẩm</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="email">Danh mục:</label>
      <select name="CategoryId">
         <option value="0">Chọn nhóm</option>
        @foreach ($cate as $cat)
            <option value="{{$cat->Id}}">{{$cat->CateName}}</option>
        @endforeach
          
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Thương hiệu/ Nhà cung cấp:</label>
      <select name="BranId">
         <option value="0">Chọn thương hiệu</option>
        @foreach ($brand as $cat)
            <option value="{{$cat->Id}}">{{$cat->CateName}}</option>
        @endforeach
          
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Tên sản phẩm:</label>
      <input type="text" class="form-control" value="{{old('ProName')}}"  placeholder="Nhập tên sản phẩm" name="ProName">
    </div>
    <div class="mb-3">
      <label for="pwd">Mô tả:</label>
      <textarea name="Description" {{old('Description')}} class="form-control" rows="3"></textarea>
    </div>
     <div class="mb-3 mt-3">
      <label for="email">Giá sản phẩm:</label>
      <input type="number" class="form-control" {{old('Price')}} placeholder="Nhập giá sản phẩm" name="Price">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Ảnh sản phẩm:</label>
      <input type="file" name="Images">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Active"> Hiển thị
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <a href="list" class="btn btn-primary">Trở lại</a>
    @csrf
  </form>
</div>


@stop