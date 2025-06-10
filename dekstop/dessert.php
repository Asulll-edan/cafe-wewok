<?php
session_start();
include "../phpmyadmin/koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Dessert Menu</title>
    <link rel="stylesheet" href="dessert.css">
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
    <li><a href="menu.php">Beranda</a></li>
    <li><a href="../Maincourse.php">Menu</a></li>
    <li><a href="#">checkout</a></li>
    <li><a href="#">Riwayat pemesanan</a></li>
    <li><a href="../lokasi_cabang.php">Lokasi Cabang</a></li>
  </ul>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeSidebar()"></div>

  <div class="menu-container">
    <div class="menu-header">DESSERT MENU</div>
    <div class="dessert-grid">
      
      <?php
       $desserts = [
         [
           'img' => 'cheesecake.jpg',
           'alt' => 'Cheesecake',
           'name' => 'Cheesecake',
           'desc' => 'Cheesecake lembut dengan dasar biskuit, cita rasa creamy dan manis yang pas.',
           'stok'=>'stok',
           'price' => 'Rp 30.000'
          ],
          [
            'img' => 'wafflechoco.jpg',
            'alt' => 'Waffle Choco',
            'name' => 'Waffle Choco',
            'desc' => 'Waffle renyah dengan siraman saus cokelat hangat dan es krim vanilla.',
            'stok'=>'stok',
          'price' => 'Rp 28.000'
        ],
        [
          'img' => 'bananasplit.jpg',
          'alt' => 'Banana Split',
          'name' => 'Banana Split',
          'desc' => 'Pisang segar dengan tiga scoop es krim dan topping buah serta kacang.',
          'stok'=>'stok',
          'price' => 'Rp 32.000'
        ],
        [
          'img' => 'brownies.jpg',
          'alt' => 'Brownie',
          'name' => 'Chocolate Brownie',
          'desc' => 'Brownie lembut dan fudgy, disajikan hangat dengan es krim vanilla.',
          'stok'=>'stok',
          'price' => 'Rp 27.000'
        ],
        [
          'img' => 'macaron.jpg',
          'alt' => 'Macaron',
          'name' => 'Macaron',
          'desc' => 'Macaron warna-warni dengan isian lembut, pilihan rasa buah dan cokelat.',
          'stok'=>'stok',
          'price' => 'Rp 35.000'
        ],
        [
          'img' => 'tiramisu.jpg',
          'alt' => 'Tiramisu',
          'name' => 'Tiramisu',
          'desc' => 'Lapisan sponge kopi dan krim mascarpone khas Italia yang lembut dan ringan.',
          'stok'=>'stok:',
          'price' => 'Rp 33.000'
        ]
       ];

       $starSVG = '<svg viewBox="0 0 24 24"><path d="M12 2L13.09 8.26L19 9.27L14.5
       13.14L15.82 19.02L12 15.77L8.18 19.02L9.5
       13.14L5 9.27L10.91 8.26L12 2Z"/></svg>';

       foreach ($desserts as $dessert) {
        echo '<div class="dessert-item">';
        echo '<img src="' . $dessert['img'] . '" alt="' . $dessert['alt'] . '">';
        echo '<div class="dessert-name">' . $dessert['name'] . '</div>';
        echo '<div class="dessert-price">' . $dessert['price'] . '</div>';
        echo '<div class="dessert-stok"> ' . $dessert['stok'] . '</div>';
        echo '<div class="dessert-desc">' . $dessert['desc'] . '</div>';
        echo '<button class="fancy-cart-button">Belanja';
        for ($i = 1; $i <= 6; $i++) {
          echo '<div class="star-' . $i . '">' . $starSVG . '</div>';
        }
        echo '</button>';
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