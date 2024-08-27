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

<div class="container mt-4">
  <h2>Đăng nhập hệ thống</h2>
  <form action="{{route('ac.dangnhap')}}" method="post">
    <div class="mb-3 mt-3">
      <label for="email">UserName:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="username">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pass">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
    <a href="{{route('ac.dk')}}"class="btn btn-primary">Đăng ký</a>
    @csrf
  </form>
</div>

</body>
</html>
