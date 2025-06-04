  <?php
  session_start();
  include "phpmyadmin/koneksi.php";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regis.css">
    <link href="https://fonts.cdnfonts.com/css/peace-sans" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Patrick+Hand&family=Press+Start+2P&family=Solway:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Daftar Cafe We Wok</title>
</head>
<body>

<?php

if(isset($_POST['username'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
  $password=$_POST['password'];

  $query= mysqli_query($db, "INSERT INTO akun(username, email, password) values( '$username','$email', '$password')");

  if($query){
    echo "<script>alert('pendaftaran berhasil')</script>";
   } else{
    echo "<script>alert('pendaftaran gagal')</script>";
    
  }
}

?>
<!-- <div class="register-module" colspan="2" align="center">

    <h3>register</h3>
        <form method="post">
            <label for="">Username:</label>
            <input type="text" name="username">
            <br>
            <br>
            <label for="">email:</label>
            <input type="text" name="email">
            <br>
            <br>
          <label for="">Password:</label>
          <input type="password" name="password">
          <br>
          <br>
          <input type="submit" name="button" value="Daftar">
        </form>
        <p>sudah memiliki akun?<a href="login.php">login</a></p>
</div> -->

<div class="login-form">
  <form method="post">
    <div class="input-login">
      <img src="image/signlogo.png" >
      <div class="title">
            <h1>REGISTER</h1>
        </div>
<div class="ketikan">

  
  <i class="fa-solid fa-circle-user" style="color: #ffffff;" ></i>
  <input type="text" name="username" placeholder="Username"> 
  <br>
  <br>
  <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
            <input type="text" name="email" placeholder="email">
            <br>
            <br>
      <i class="fa-solid fa-key" style="color: #ffffff;" ></i>
   <input type="password" name="password" placeholder="password">
   <br>
   <br>
  </div>
   <div class="submit-tombol">
     <input type="submit" name="button" value="REGISTER" >
     
    </div>
</div>
  </form>
  <div class="bacaan-bawah">
  <a href="login.php">LOGIN</a>
  </div>
</div>
</body>
</html>
