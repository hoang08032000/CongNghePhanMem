<?php
if(isset($_GET['id'])){
   require 'ketnoi.php';
   $sql = "SELECT * from user where email = '" . $_GET['id'] . "'";
   $result = mysqli_query($conn,$sql);
   $rows = mysqli_fetch_assoc($result);
   if ($rows['status'] == $_POST['ma']){
     echo '<h3 style ="text-align : center">Đăng Ký Thành Công !</h3>';
     require 'ketnoi.php';
     $sqlii = "UPDATE user set status = 1,user_level=1 where email = '" . $_GET['id'] . "'";
     $resultii = mysqli_query($conn,$sqlii);
     require 'index.html';
   }
   else {
     echo'<h3>Sai mã OTP !</h3>';
     ?>
    <form action="dangki1.php?id=<?php echo $_GET['id'];?>" method = "post">
    <h1>Nhập mã xác thực được gửi tới email của bạn : </h1>
    <input type="text" name ="ma" value = "">
    <input type="submit" value="xac nhan">
    </form>
     <?php 
   }
  }
else {
require 'ketnoi.php';
//kiem tra email trung khong
$sqli = "SELECT * from user where email = '" . $_POST['email'] . "' ";
$resulti = mysqli_query($conn,$sqli);
$rows = mysqli_num_rows($resulti);
if($rows>0){
  echo '<H3>Email đã tồn tại</H3>';
  require 'register.php';
}else{
    //tao tai khoan
    $a = rand(10000,99999);
    $sql = "INSERT into user(iduser,email,name,phone,address,password,status) values(null,'" . $_POST['email'] . "','" .$_POST['userName'] . "',null,null,'". $_POST['password']."',$a)";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      die('chua them duoc');
    }
    else{
      require './sendmail/PHPMailerAutoload.php';
      $mail = new PHPMailer(true);                                 // Enable verbose debug output  
      $mail->isSMTP();                                       // Set mailer to use SMTP  
      $mail->Host = 'smtp.gmail.com;';                       // Specify main and backup SMTP servers  
      $mail->SMTPAuth = true;                                // Enable SMTP authentication  
      $mail->Username = 'traituoirong2411@gmail.com';               // your SMTP username  
      $mail->Password = 'sqjjznytuusymvas';                      // your SMTP password  
      $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted  
      $mail->Port = 587;                                     // TCP port to connect to  
      $mail->setFrom('traituoirong2411@gmail.com', 'Chợ Online');  
      $mail->addAddress($_POST['email']);                 // Name is optional  
      $mail->addReplyTo($_POST['email'], 'Information');  
      //$mail->addCC('cc@example.com');                        // set your CC email address  
      //$mail->addBCC('bcc@example.com');                      // set your BCC email address  
      $mail->isHTML(true);                                   // Set email format to HTML  
      $mail->Subject = 'ma OTP'; 
      $mail->Body  = 'ma OTP la : '.$a;  
      if($mail->send()) {  ?> 
     <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
        </head>
        <body>
          <form action="dangki1.php?id=<?php echo $_POST['email'];?>" method = "post">
            <h1>Nhập mã xác thự được gửi tới email của bạn : </h1>
            <input type="text" name ="ma" value = "">
            <input type="submit" value="xac nhan">
          </form>
        </body>
      </html>
      <?php
     } else {  
      echo 'Message could not be sent';  
     }
      ?>
<?php
    } 
  } 
}
?> 