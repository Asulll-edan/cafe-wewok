<?php
include "phpmyadmin/koneksi.php";
$sql = "SELECT * FROM stok_barang";
$result = mysqli_query($db, $sql);

$maincourse = [];
while ($row = mysqli_fetch_assoc($result)) {
    $maincourse[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Main Course</title>
  <link rel="stylesheet" href="Combo.css">
</head>
<body>
  <!-- Tombol garistiga -->
<button id="garistiga-btn" class="navbar-toggle" onclick="openSidebar()">
  ☰
</button>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
  <!-- Tombol close di dalam sidebar -->
  <button id="close-btn" class="close-btn" onclick="closeSidebar()">×</button>
  
  <ul>
    <li><a href="dekstop/menu.php">Beranda</a></li>
    <li><a href="../Maincourse.php">Menu</a></li>
    <li><a href="#">checkout</a></li>
    <li><a href="#">Riwayat pemesanan</a></li>
    <li><a href="../lokasi_cabang.php">Lokasi Cabang</a></li>
  </ul>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeSidebar()"></div>
  
  <div class="menu-container">
    <div class="menu-header">MAIN COURSE</div>
  
     <div class="MC-grid">
  <?php
  foreach ($maincourse as $item) {
    echo '<div class="MC-item">';
    echo '<img src="image/' . $item['foto'] . '">';
    echo '<div class="MC-name">' . $item['nama_item'] . '</div>';
    echo '<div class="MC-stok">Stok: ' . $item['jumlah_stok'] . '</div><br>';
    echo '<div class="MC-stok">Rp: ' . $item['price'] . '</div>';
    echo '<input type="submit" name="tombol" value="Belanja" class="fancy-cart-button">';
    echo '</div>';
  }
  ?>
</div>
  </div>
</body>
<script>
function openSidebar() {
  document.getElementById('sidebar').classList.add('active');
  document.getElementById('overlay').classList.add('active');
  document.getElementById('garistiga-btn').style.display = 'none';
}

function closeSidebar() {
  document.getElementById('sidebar').classList.remove('active');
  document.getElementById('overlay').classList.remove('active');
  document.getElementById('garistiga-btn').style.display = 'block';
}
</script>
</html>