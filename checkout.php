<?php
include "phpmyadmin/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $item_id = intval($_POST['item_id']);
    $item_name = $_POST['item_name'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

  
    $cek_stok = mysqli_query($db, "SELECT jumlah_stok FROM stok_barang WHERE id=$item_id");
    $data_stok = mysqli_fetch_assoc($cek_stok);

    if ($quantity > $data_stok['jumlah_stok']) {
        echo "Jumlah melebihi stok yang tersedia.";
        exit;
    }

 
    $new_stok = $data_stok['jumlah_stok'] - $quantity;
    mysqli_query($db, "UPDATE stok_barang SET jumlah_stok=$new_stok WHERE id=$item_id");

    
    $stmt = mysqli_prepare($db, "INSERT INTO orders (item_id, item_name, price, quantity) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isdi", $item_id, $item_name, $price, $quantity);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $bacaan ="<div class='bacaan-co'>Checkout berhasil!</div>
        <br>
       <div class='bacaan-riwayat'>
        <a href='riwayat.php'>Lihat Riwayat Pemesanan</a>
        </div>";
    } else {
        $bacaan ="Gagal menyimpan pesanan.";
    }
} else {
    $bacaan ="Tidak ada data pesanan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
   
</head>
<body>
    <?php echo $bacaan?>
</body>
</html>