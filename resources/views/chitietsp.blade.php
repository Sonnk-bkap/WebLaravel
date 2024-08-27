<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>{{$pr->ProName}}</h2>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Giá: {{$pr->Price}}</h4>
      <p class="card-text">{{$pr->Description}}</p>
      <a href="{{route('cart.them',$pr->Id)}}" class="btn btn-primary">Đặt mua</a>
    </div>
    <img class="card-img-bottom"  src="{{$pr->Images}}"  alt="Card image" style="width:100%">
  </div>
</div>
<br>
<div class="container">
  <h2>Danh sách sản phẩm đã xem</h2>
  @foreach ($spdx as $row)
  <div class="card" style="width:400px;float: left;">
    <img class="card-img-top" src="{{$row->Images}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$row->ProName}}</h4>
      <p class="card-text">{{$row->Description}}</p>
      <h3>Giá: <b>{{ number_format($row->Price)}}</b></h3>
      <a href="{{route('sp.ct',[\Str::slug($row->ProName),$row->Id])}}" class="btn btn-primary">Xem thêm</a>
      <a href="{{route('cart.them',$row->Id)}}" class="btn btn-primary">Đặt mua</a>
    </div>
  </div>
    @endforeach
  <br>
</body>
</html>
