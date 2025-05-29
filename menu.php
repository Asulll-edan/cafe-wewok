<?php include 'phpmyadmin/koneksi.php';
// contoh hungkul ieumah
 ?>
<h2>Menu</h2>
<form method="POST" action="tambah_chart.php">
    <input type="hidden" name="item_name" value="Nasi Goreng">
    <input type="hidden" name="price" value="15000">
    Jumlah: <input type="number" name="quantity" value="1" min="1">
    <input type="submit" value="Pesan"herf= "checkout.php">
</form>

<form method="POST" action="tambah_chart.php">
    <input type="hidden" name="item_name" value="Mie Ayam">
    <input type="hidden" name="price" value="12000">
    Jumlah: <input type="number" name="quantity" value="1" min="1">
    <input type="submit" value="Pesan" herf= "checkout.php">
</form>
