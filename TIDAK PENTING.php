<?php
include 'phpmyadmin/koneksi.php';


$cartItems = $db->query("SELECT * FROM orders");


$total = 0;
while ($row = $cartItems->fetch_assoc()) {
    $total += $row['quantity'] * $row['price'];
}
$cartItems->data_seek(0); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
<div class="container">
    <h1>Checkout</h1>

    <div class="box">
        <label>Items:</label><br>
        <?php while ($item = $cartItems->fetch_assoc()): ?>
            <?= htmlspecialchars($item['item_name']) ?> - <?= $item['quantity'] ?> x Rp<?= number_format($item['price']) ?><br>
        <?php endwhile; ?>
    </div>

    <div class="box">
        <label>Total:</label><br>
        <strong>Rp<?= number_format($total) ?></strong>
    </div>

    <form action="checkout_submit.php" method="POST">
        <div class="box">
            <label>Bayar:</label><br>
            <input type="datetime-local" name="order_date" required><br><br>
            <select name="method" required>
                <option value="">Pilih metode</option>
                <option value="Dine In">Dine In</option>
                <option value="Take Away">Take Away</option>
            </select>
        </div>

        <input type="submit" value="Simpan Pesanan">
    </form>
</div>
</body>
</html>
