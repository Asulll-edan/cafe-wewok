<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu Interaktif</title>
  <link rel="stylesheet" href="menu.css" />
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

<!-- menu -->
  <div class="menu-container">
    <div class="best-seller">
      <h2>BEST SELLER</h2>
      <div class="best-items">
        <?php
        $bestItems = [
          ['img' => 'img/dessert1.jpg', 'name' => 'bebas'], 
          ['img' => 'img/main1.jpg', 'name' => 'bebas'],
          ['img' => 'img/drink1.jpg', 'name' => 'bebas']
        ];

        foreach ($bestItems as $item) {
          echo '<div class="item">';
          echo '<img class="best-img" src="' . $item['img'] . '" alt="' . $item['name'] . '">';
          echo '<div class="best-name">' . $item['name'] . '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="categories">
      <a href="dessert.php" class="category">
        <div class="icon"><img src="dessert.png" alt="Dessert Icon"></div>
        <p>Dessert</p>
      </a>
      <div class="category">
        <div class="icon"><img src="main course.png" alt="Main Course Icon"></div>
        <p>Main Course</p>
      </div>
      <div class="category">
        <div class="icon"><img src="drink.png" alt="Drink Icon"></div>
        <p>Drinks</p>
      </div>
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