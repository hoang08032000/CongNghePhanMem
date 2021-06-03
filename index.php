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
    <link rel="stylesheet" href="css/main.css" />
    
    <title>Document</title>
  </head>
  <body>
<?php
require 'nav.php'; ?>
    <div class="category-container">
      <span class="categories">Danh mục</span>
      <div>
      <a href="search.php?search=dienthoai">
        <div class="detail-category">
          <div class="img-category">
            <img src="./images/31234a27876fb89cd522d7e3db1ba5ca_tn.png" alt="" />
          </div>
          <div class="title">Điện thoại</div>
        </div>
     </a>
      <a href="search.php?search=mayanh">
        <div class="detail-category">
          <div class="img-category">
            <img src="./images/ec14dd4fc238e676e43be2a911414d4d_tn.png" alt="" />
          </div>
          <div class="title">Máy ảnh - Máy quay phim</div>
        </div>
        </a>
        <a href="search.php?search=maytinh">
        <div class="detail-category">
          <div class="img-category">
            <img src="./images/c3f3edfaa9f6dafc4825b77d8449999d_tn.png" alt="" />
          </div>
          <div class="title">Máy tính</div>
        </div>
        </a>
        <a href="search.php?search=xeco">
        <div class="detail-category">
          <div class="img-category">
            <img src="./images/978b9e4cb61c611aaaf58664fae133c5_tn.png" alt="" />
          </div>
          <div class="title">Xe Cộ</div>
        </div>
        </a>
        <a href="search.php?search=mypham">
        <div class="detail-category">
          <div class="img-category">
            <img src="./images/bba68b7dc2d664748dd075d500049d72_tn.png" alt="" />
          </div>
          <div class="title">Mỹ phẩm</div>
        </div>
        </a>
      </div>
    </div>
    <div class="product-container">
    <div class="header">Tin đăng dành cho bạn</div>
    <?php
    $sql = "SELECT COUNT(idsp) as total FROM sanpham";
    $resultt = mysqli_query($conn,$sql);
    $rowt = mysqli_fetch_assoc($resultt);
    $total_records = $rowt['total'];   
    if($total_records <= 10){
    $sqli = "SELECT * FROM sanpham ";
    $resulti = mysqli_query($conn,$sqli);
    }
    else{
     $c = $total_records - 9;
     $sqli = "SELECT * FROM sanpham LIKE $c,$total_records ";
     $resulti = mysqli_query($conn,$sqli);}
    while ($rows = mysqli_fetch_assoc($resulti)){
     ?>
      <div class="products">
        <div class="product">
          <a href="detail.php?id=<?php echo $rows['idsp']?>">
            <div class="img-product">
            <?php echo'<img src="data:avatar;base64,'.base64_encode($rows['photo']).'"alt="">'; ?>
            </div>
            <div class="title"><?php echo $rows['tensp'] ?></div>
            <div class="price"><?php echo $rows['giatien'] ?></div>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>
    
  </body>
</html>
