<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
@foreach ($cart ->items as $row)
   

      <tr>
        <td> {{$loop->index+1}}</td>
        <td><img src="{{$row->image}}" width="100px"></td>
        <td>{{$row->name}}</td>
        <td style="text-align: right;">{{number_format($row->gia)}}</td>
        <td>
            <form action="{{route('cart.capnhat',$row->id)}}" method="get">
                <input type="hidden" value="{{$row->id}}" name="id">
                <input type="hidden" value="update" name="action">
                <input type="number" value="{{$row->soluong}}" name="soluong">
                <button type="submit">Cập nhật</button>
            </form>
        </td>
        <td style="text-align: right;">{{number_format($row->soluong * $row->gia)}}</td>
        <td>
          
            <a class="btn btn-danger" href="{{route('cart.xoa',$row->id)}}">Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tr>
        <th colspan="5">Tổng tiền</th>
        <th style="text-align: right;">{{number_format($cart->totalPrice)}}</th>
        <td></td>
    </tr>
</table>

<a href="/" class="btn btn-info">Tiếp tục mua</a>
<a class="btn btn-danger" href="{{route('cart.huy')}}">Hủy giỏ hàng</a>
<a class="btn btn-success">Đặt hàng</a>

</body>
</html>