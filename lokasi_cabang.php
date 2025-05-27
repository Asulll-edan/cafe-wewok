<?php
// lokasi_cabang.php

// Sertakan file koneksi database
include 'koneksi.php'; // Asumsi file koneksi.php ada di direktori yang sama

// Ambil data lokasi cabang dari database
$sql = "SELECT id, nama_cabang, alamat, latitude, longitude, gambar_url FROM lokasi_cabang ORDER BY nama_cabang ASC";
$result = $conn->query($sql);

$cabang_locations = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cabang_locations[] = $row;
    }
}
// Tutup koneksi database sete lah semua  data diambil
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Cabang</title>
    <link rel="stylesheet" href="style_lokasi.css"> </head>
<body>
    <div class="container-lokasi">
        <h1>LOKASI CABANG</h1>
        <div class="cabang-list">
            <?php if (count($cabang_locations) > 0): ?>
                <?php foreach ($cabang_locations as $cabang): ?>
                    <div class="cabang-card">
                        <div class="cabang-image-placeholder">
                            <?php if (!empty($cabang['gambar_url']) && file_exists($cabang['gambar_url'])): ?>
                                <img src="<?php echo htmlspecialchars($cabang['gambar_url']); ?>" alt="Foto <?php echo htmlspecialchars($cabang['nama_cabang']); ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x300?text=No+Image" alt="Gambar Tidak Tersedia">
                            <?php endif; ?>
                        </div>
                        <p class="cabang-address"><?php echo htmlspecialchars($cabang['alamat']); ?></p>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($cabang['latitude'] . ',' . $cabang['longitude']); ?>" target="_blank" class="map-link">
                            <img src="images/map-pin.png" alt="Pin Lokasi" class="map-pin-icon"> </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada data lokasi cabang.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>