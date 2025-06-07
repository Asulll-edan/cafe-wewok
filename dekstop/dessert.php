<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Dessert Menu</title>
    <link rel="stylesheet" href="dessert.css">
  </head>
  <body>
  <div class="back-button-container">
    <a href="menu.php" class="back-button">← Kembali ke Menu Utama</a>
  </div>
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
          'price' => 'Rp 30.000'
        ],
        [
          'img' => 'wafflechoco.jpg',
          'alt' => 'Waffle Choco',
          'name' => 'Waffle Choco',
          'desc' => 'Waffle renyah dengan siraman saus cokelat hangat dan es krim vanilla.',
          'price' => 'Rp 28.000'
        ],
        [
          'img' => 'bananasplit.jpg',
          'alt' => 'Banana Split',
          'name' => 'Banana Split',
          'desc' => 'Pisang segar dengan tiga scoop es krim dan topping buah serta kacang.',
          'price' => 'Rp 32.000'
        ],
        [
          'img' => 'brownies.jpg',
          'alt' => 'Brownie',
          'name' => 'Chocolate Brownie',
          'desc' => 'Brownie lembut dan fudgy, disajikan hangat dengan es krim vanilla.',
          'price' => 'Rp 27.000'
        ],
        [
          'img' => 'macaron.jpg',
          'alt' => 'Macaron',
          'name' => 'Macaron',
          'desc' => 'Macaron warna-warni dengan isian lembut, pilihan rasa buah dan cokelat.',
          'price' => 'Rp 35.000'
        ],
        [
          'img' => 'tiramisu.jpg',
          'alt' => 'Tiramisu',
          'name' => 'Tiramisu',
          'desc' => 'Lapisan sponge kopi dan krim mascarpone khas Italia yang lembut dan ringan.',
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
</html>