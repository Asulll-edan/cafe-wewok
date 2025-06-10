<?php
// index.php atau lokasi file utama
include 'phpmyadmin/koneksi.php';

$sql = "SELECT id, nama_item, jumlah_stok FROM stok_barang";
$result = $db->query($sql);

$items = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

$db->close();

$kolom1 = array_slice($items, 0, 9);
$kolom2 = array_slice($items, 9, 9);
$kolom3 = array_slice($items, 18);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Barang</title>
    <link rel="stylesheet" href="stok.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <a href="adminpage.php">

<h1>STOK BARANG</h1>
        </a>
        <div class="stock-panel three-columns">
            <div class="column">
                <?php foreach ($kolom1 as $item): ?>
                    <?php include 'stock_item_template.php'; ?>
                <?php endforeach; ?>
            </div>
            <div class="column">
                <?php foreach ($kolom2 as $item): ?>
                    <?php include 'stock_item_template.php'; ?>
                <?php endforeach; ?>
            </div>
            <div class="column">
                <?php foreach ($kolom3 as $item): ?>
                    <?php include 'stock_item_template.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <button id="btn-save" class="btn-sv">Save</button>
    </div>

    <script src="script.js"></script>
</body>
</html>
