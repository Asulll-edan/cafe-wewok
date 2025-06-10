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
    <li><a href="riwayat.php">Riwayat pemesanan</a></li>
    <li><a href="../lokasi_cabang.php">Lokasi Cabang</a></li>
  </ul>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeSidebar()"></div>
  
  <div class="menu-container">
  <div class="menu-header">MAIN COURSE</div>
  <div class="MC-grid">
  <?php foreach ($maincourse as $item): ?>
    <div class="MC-item">
      <img src="image/<?php echo $item['foto']; ?>">
      <div class="MC-name"><?php echo $item['nama_item']; ?></div>
      <div class="MC-stok">Stok: <?php echo $item['jumlah_stok']; ?></div><br>
      <div class="MC-stok">Rp: <?php echo number_format($item['price'], 0, ',', '.'); ?></div>
      
      <form action="checkout.php" method="post">
        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
        <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($item['nama_item']); ?>">
        <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
        Jumlah: <input type="number" name="quantity" value="1" min="1" max="<?php echo $item['jumlah_stok']; ?>" required>
        <input type="submit" name="checkout" value="Belanja" class="fancy-cart-button">
      </form>
    </div>
  <?php endforeach; ?>
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