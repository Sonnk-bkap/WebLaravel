@extends('AdminMaster')
@section('main')
<div class="container-fluid">
  <h2>Cập nhật danh mục</h2>
  <form action="{{route('cate.update',$cate->Id)}}" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Tên danh mục:</label>
      <input type="text" class="form-control" value="{{($cate->CateName)}}" placeholder="Nhập tên danh mục" name="CateName">
      @error('CateName')
        <div class="alert alert-danger">
            {{$message}}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Thứ tự hiển thị:</label>
      <input type="number" class="form-control" value="{{$cate->Ord}}"  placeholder="Nhập thứ tự: 1,2,3,4" name="Ord">
      @error('Ord')
        <div class="alert alert-danger">
            {{$message}}
        </div>
      @enderror
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Active"> Cho phép
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <a href="/Category/list"class="btn btn-primary">Trở lại</a>
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
    @method("PUT")
  </form>
</div>
@stop