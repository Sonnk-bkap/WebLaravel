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
           <!-- Hiển thị menu trên  -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <a class="navbar-brand" href="#">Title</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Category</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="" id="profile"></a></li>
                <li><a href="" id="btn-logout">Thoát</a></li>
                <li><a href="#modal-login" id="show-login" data-bs-toggle="modal" data-bs-target="#modal-login">Đăng nhập</a></li>
            </ul>
        </div>
    </nav>

<div class="container">
  <h2>Danh sách sản phẩm</h2>
  @foreach ($sp as $row)
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
  <table id="table-list" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="list">

        </tbody>
    </table>

          <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            // code javascript ajax ở đây
        </script>

         <!-- Thông báo lỗi khi chưa đăng nhập -->
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Chưa đăng nhập!</strong> Hãy <a href="#modal-login" data-toggle="modal" id="show-login">click vào đây</a> để dăng nhập
        </div>
    </div>

    
    <!-- Modal đăng nhập sẽ hiển thị nếu chưa đăng nhập  -->
    <div class="modal" id="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Input email">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="password" class="form-control" id="password" placeholder="Input password">
                        </div>
                        <input type="hidden" value="{{csrf_token()}}"id="token">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-login" class="btn btn-primary">Đăng nhập</button>
                </div>
            </div>
        </div>
    </div>
<script>
        // Lấy mã token đã lưu trong sessionStorage
        var token = sessionStorage.getItem('api-token');
        // nếu không có mã toke  trong sessionStorage
        if (!token) {
         
            $('#modal-login').modal('show');
            $('#show-login').show(); // show modal login
            $('#btn-logout').hide(); // ẩn nút "Thoát"
            $('#table-list').hide(); // Ẩn bảng danh mục
        } else {
            // lấy thông tin người dùng để hiển thị lên menu
            $.ajax({
                url: 'http://localhost:8000/api/user/me',
                type: 'GET',
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + token
                },
                success: function (res) {
                   $('#profile').html(res.data.name); // Hiển thị thông tin tên đăng nhập
                   $('#show-login').hide(); // ẩn nút login
                   $('.alert-danger').hide(); // ẩn thông báo lỗi
                },
                error: function (error) {
                    // console.log(error.responseText );
                    $('#modal-login').modal('show');
                }
            });

            // khi click vào nút "Thoát"
            $('#btn-logout').click(function(ev) {
                ev.preventDefault();
                sessionStorage.removeItem('api-token'); // hủy mã token
                location.reload();
            })

            // Hiển thị danh sách danh mục
            $.ajax({
                url: 'http://localhost:8000/api/categories',
                type: 'GET',
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + token
                },
                success: function (res) {
                    let _tr = '';
                    res.data.forEach(cat => {
                        _tr += `<tr>
                            <td>${cat.id}</td>
                            <td>${cat.name}</td>
                            <td>${cat.status}</td>
                            <td>
                            <button type="button" class="btn btn-danger btn-delete" data-id="${cat.id}">Xó</button>
                            </td>
                        </tr>`;
                    });

                    $('#list').html(_tr);
                },
                error: function (error) {
                    // console.log(error.responseText );
                    $('#modal-login').modal('show');
                }
            });
        }

        // thực hiện đăng nhập
        $('#btn-login').click(function (ev) {
            ev.preventDefault();
            var data = {
                email: $('#email').val(),
                password: $('#password').val(),
                _token:$('#token')
            }
            $.ajax({
                url: 'http://127.0.0.1:8000/User/logon',
                type: "POST",
                data: data,
                 
                success: function (res) {
                    console.log(res);
                    if (res.error) {
                        alert(res.error);
                    } else {
                        // lưu mã token trong sessionStorage
                        sessionStorage.setItem('api-token', res.token);
                        location.reload();
                    }
                }
            })
        })

    </script>


</body>
</html>
