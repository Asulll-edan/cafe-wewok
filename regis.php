  <?php
  session_start();
  include "phpmyadmin/koneksi.php";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="register-module" colspan="2" align="center">

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
</div>
</body>
</html>
