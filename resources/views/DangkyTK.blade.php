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
  <h2>Đăng ký tài khoản</h2>
  <form action="{{route('ac.dksv')}}" method="post">
    <div class="mb-3 mt-3">
      <label for="email">UserName:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="username">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pass">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Họ tên:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="fullname">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Điện thoại:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email">
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Đăng ký</button>
    <a href="/"class="btn btn-primary">Hủy bỏ</a>
  </form>
</div>

</body>
</html>
