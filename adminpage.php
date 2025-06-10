<?php
session_start();
include "phpmyadmin/koneksi.php";

      if($_SESSION['kategori'] !== 'admin'){
        header('location:dekstop.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/peace-sans" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Patrick+Hand&family=Press+Start+2P&family=Solway:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="adminpage.css">
    <title>Document</title>
</head>
<body>

    <div class="tabel">
        <div class="search-tabel">
            <form method="get">
                <input type="text" name="search" placeholder="search...">
                <input type="submit" value="search">
                <a class="logot" href="logout.php">logout</a>
                <a class="logot" href="stok_barang.php">update stok</a>
            </form>
        </div>
        <div class="navbar-tabel">
            <p>username</p>
            <p>email</p>
            <p>password</p>
            <p>keterangan</p>

        </div>

        <!-- list nama -->
         <div class="list-nama">

             <?php
             if(isset($_GET['search'])){
                $search=$_GET['search'];
                $query="SELECT*from akun where username like '%".$search."%' ";
             }else{
                $query="SELECT*from akun";
             }
            //  $ambildata="select * from akun order by id desc";
             $hasil=mysqli_query($db,$query);
             while($data=mysqli_fetch_array($hasil)){?>
            
 
             <p><?php echo $data['username'];?></p>
             <p><?php echo $data['email'];?></p>
             <p><?php echo $data['password'];?></p>
             <p><a href="edit_user.php?Id_akun=<?= $data['Id_akun'] ?>"><button>Edit</button></a> / <a href="hapus_user.php?Id_akun=<?= $data['Id_akun'] ?>"><button>hapus</button></a></p>
             
            
 
             <?php }?>
         </div>
    </div>
</body>
</html>