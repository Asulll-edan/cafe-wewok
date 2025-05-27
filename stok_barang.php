<?php// Sertakan file koneksi database
include 'koneksi.php';

// A mbil data stok dari database
$sql = "SELECT id, nama_item, jumlah_stok FROM stok_barang";
$result = $conn->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
// Tutup koneksi da tabase setelah semua data diambil
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Barang</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
    <div class="container">
    <h1>STOK BARANG</h1>
    <div class="stock-panel">
        <?php if (count($items) > 0): ?>
            <?php foreach ($items as $item): ?>
                <div class="stock-item" data-id="<?php echo $item['id']; ?>">
                    <span class="item-name"><?php echo htmlspecialchars($item['nama_item']); ?></span>
                    <div class="controls">
                        <button class="btn-minus" data-action="minus">-</button>
                        <span class="stock-value"><?php echo $item['jumlah_stok']; ?></span>
                        <button class="btn-plus" data-action="plus">+</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada data stok barang.</p>
        <?php endif; ?>
    </div>
    <button id="btn-save" class="btn-save">Save</button> <!-- Tombol Save -->
</div>

    <script src="script.js"></script>
</body>
</html>  