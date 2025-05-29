<?php
session_start();

if(!isset($_SESSION['akun'])){
    header('location:login.php');

    if($_SESSION['kategori'] !== 'user'){
        header('location:adminpage.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Halaman DEKSTOP</h1>
    </center>

    <a href="logout.php">logout

    </a>
</body>
</html>