<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form liên hệ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Thông tin liên hệ</h2>
  @if (Session::has('ok'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Successfully!</strong> gửi email thành công
</div>
@endif

  <form action="{{route('send_contact')}}" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Họ tên:</label>
      <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten">
    </div>
    <div class="mb-3">
      <label for="pwd">Nội dung:</label>
      <textarea name="noidung" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gửi mail</button>
    @csrf
  </form>
</div>

</body>
</html>
