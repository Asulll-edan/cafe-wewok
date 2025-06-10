<?php
include "phpmyadmin/koneksi.php";

$id=$_GET['Id_akun'];
$query=mysqli_query($db, "SELECT * from akun where Id_akun ='$id' ");
$data=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="edit_user.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>edit</title>
</head>
<body>
    <h1 align="center">Edit User</h1>
<form method="post">

    <div class="edit-input">
        <div class="input-group mb-3">
      <div class="form-floating">
        <input type="text" class="form-control" value="<?php echo $data['username']?>" id="floatingInputGroup1" name="Username" placeholder="Username">
        <label for="floatingInputGroup1">Username</label>
      </div>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" value="<?php echo $data['email']?>" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" value="<?php echo $data['password']?>" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    </div>
    <br>
        <div class="tombol">
      <input type="submit" name="submit" value='simpan'>
      <a href="edit_user.php">
<input type="submit" name="cancel" value='cancel'>
      </a>
    </div>
</form>
</body>
</html>

  <?php
            if(isset($_POST['submit'])){
    $username=$_POST['Username'];
    $email=$_POST['email'];
  $password=$_POST['password'];

  mysqli_query($db, "UPDATE akun SET  username='$username' , email='$email' , password='$password' WHERE 
  Id_akun='$id'");
  header('location:adminpage.php');
            }

?>