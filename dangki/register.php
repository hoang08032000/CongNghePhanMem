<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Document</title>
  </head>
  <body>
    <!-- nav  -->
    <div class="nav-container">
      <div class="nav">
        <div class="aside-left">
          <div class="logo">
            <img src="../images/choOnline.png" alt="" />
          </div>
        </div>
        <div class="aside-right">
          <div>
            <a href="http://localhost:85/CongNghePhanMem/index.php"><i class="ri-home-line"></i> Trang chủ</a>
          </div>
          <div>
            <a href="./management.html"><i class="ri-group-line"></i> Quản lí tin</a>
          </div>
          <div><i class="ri-more-line"></i> Thêm</div>
        </div>
        <div class="aside-left">
          <div class="search">
            <form action="" class="form-search">
              <span>Search</span>
              <input type="text" name="search" />
              <button class="btn" type="submit"><i class="ri-search-line"></i></button>
            </form>
          </div>
        </div>
        <div class="aside-right">
          <div><a href="login.php">Đăng nhập</a></div>
          <div><a href="login.php">Đăng Tin</a></div>
        </div>
      </div>
    </div>
    <div class="register-container">
      <form class="form-register" action="dangki1.php" method="post" >
        <h1>Đăng ký</h1>
        <div class="input-wrapper">
          <input type="text" name="userName" placeholder="Nhập họ tên của bạn" />
        </div>
        <div class="input-wrapper">
          <input type="email" name="email" placeholder="Nhập email của bạn" />
        </div>
        <div class="input-wrapper">
          <input type="password" name="password" placeholder="Nhập password của bạn" />
        </div>
        <div class="input-wrapper">
          <input type="password" name="confirmPassword" placeholder="Nhập lại password của bạn" />
        </div>
        <div class="submit">
          <button type="submit">Đăng ký</button>
          <div>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a></div>
        </div>
      </form>
    </div>
  </body>
</html>
