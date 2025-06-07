  <?php
  session_start();
  include "phpmyadmin/koneksi.php";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.cdnfonts.com/css/peace-sans" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Patrick+Hand&family=Press+Start+2P&family=Solway:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login Cafe We Wok</title>
</head>
<body>

<?php

if(isset($_POST['username'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $query= mysqli_query($db, "SELECT*FROM akun WHERE username='$username' AND password='$password'");

  if(mysqli_num_rows($query) > 0){
    $data= mysqli_fetch_array($query);
    $_SESSION['akun']=$data;
    $_SESSION['kategori']=$data['kategori'];

    if($data['kategori']=='admin'){

      echo'<script class="alert alert-warning" role="alert">alert("selamat anda berhasil login");
      location.href="adminpage.php";</script>';
    } else if ($data['kategori']=='user'){

    }
      echo'<script class="alert alert-warning" role="alert">alert("selamat anda berhasil login");
      location.href="dekstop/menu.php";</script>';
    
    
  }else{
    echo'<script>alert("salah pw/username")</script>';
  }
}

?>
<div class="login-form">
  <form method="post">
    <div class="input-login">
      <a href="index.php">
        <img src="image/loginlogo.png" >
      </a>
      <div class="title">
            <h1>LOG IN</h1>
        </div>
<div class="ketikan">
 <i class="fa-solid fa-circle-user" style="color: #ffffff;" ></i>
      <input type="text" name="username" placeholder="Username"> 
      <br>
      <br>
      <i class="fa-solid fa-key" style="color: #ffffff;" ></i>
   <input type="password" name="password" placeholder="password">
   <br>
   <br>
  </div>
   <div class="submit-tombol">
     <input type="submit" name="button" value="LOGIN" >
     
    </div>
</div>
  </form>
  <div class="bacaan-bawah">
    <p>lupa kata sandi?</p>
<p>Tidak memiliki akun?<a href="regis.php">Buat akun baru</a></p>
  </div>
</div>
</body>
</html>
