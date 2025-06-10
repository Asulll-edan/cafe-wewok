<?php
include "phpmyadmin/koneksi.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$no = 1;
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pemesanan</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <h1>Riwayat Pemesanan</h1>
  <a href="Maincourse.php">Kembali ke Menu</a>
  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>Nama Item</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Tanggal Pesan</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo htmlspecialchars($row['item_name']); ?></td>
      <td>Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></td>
      <td><?php echo $row['quantity']; ?></td>
      <td>Rp <?php echo number_format($row['price'] * $row['quantity'], 0, ',', '.'); ?></td>
      <td><?php echo $row['order_date']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
