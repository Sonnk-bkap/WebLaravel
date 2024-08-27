@extends('AdminMaster')
@section('main')

<div class="container mt-3">
  <h2>Cập nhật sản phẩm</h2>
  <form action="{{route('update',$Pro->Id)}}" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="email">Danh mục:</label>
      <select name="CategoryId">
            <option value="0">Chọn</option>
            @foreach ($cate as $cat)
                @if($cat->Id==$Pro->CategoryId)
                    <option value="{{$cat->Id}}" selected>{{$cat->CateName}}</option>
                @else
                    <option value="{{$cat->Id}}">{{$cat->CateName}}</option>
                @endif
            @endforeach
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Tên sản phẩm:</label>
      <input type="text" class="form-control" value="{{$Pro->ProName}}"  placeholder="Nhập tên sản phẩm" name="ProName">
    </div>
    <div class="mb-3">
      <label for="pwd">Mô tả:</label>
      <textarea name="Description" class="form-control" rows="3">{{$Pro->Description}}</textarea>
    </div>
     <div class="mb-3 mt-3">
      <label for="email">Giá sản phẩm:</label>
      <input type="number" class="form-control" value="{{$Pro->Price}}" placeholder="Nhập giá sản phẩm" name="Price">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Ảnh sản phẩm:</label>
      <input type="hidden" value="{{$Pro->Images}}" name="imgold">
      <input type="file" name="Images">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Active"> Hiển thị
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <a href="{{route('index')}}" class="btn btn-primary">Trở lại</a>
    @method('PUT')
    @csrf
  </form>
</div>


@stop