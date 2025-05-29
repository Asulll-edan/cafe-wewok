<?php

// contoh hungkul ieumah

include 'phpmyadmin/koneksi.php';

$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$stmt = $db->prepare("INSERT INTO cart (item_name, quantity, price) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $item_name, $quantity, $price);
$stmt->execute();

header("Location: checkout.php"); // Atau ke checkout.php kalau langsung ingin lanjut ke checkout
exit();
?>
