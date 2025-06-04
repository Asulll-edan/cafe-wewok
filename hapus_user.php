<?php
include "phpmyadmin/koneksi.php";

$id=$_GET['Id_akun'];
$query=mysqli_query($db,"DELETE  from akun where Id_akun ='$id' ");
header('location:adminpage.php');
?>