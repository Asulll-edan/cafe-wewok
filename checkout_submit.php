<?php
include 'phpmyadmin/koneksi.php';

$cart = $db->query("SELECT * FROM cart");

$order_date = $_POST['order_date'];
$method = $_POST['method'];

while ($item = $cart->fetch_assoc()) {
    $item_name = $item['item_name'];
    $quantity = $item['quantity'];
    $total_price = $quantity * $item['price'];

    $stmt = $db->prepare("INSERT INTO orders (item_name, quantity, total_price, order_date, method) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siiss", $item_name, $quantity, $total_price, $order_date, $method);
    $stmt->execute();
}

$db->query("DELETE FROM cart");

header("Location: histori.html");
exit();
?>
