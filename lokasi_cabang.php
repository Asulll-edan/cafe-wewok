<?php
session_start();
include "phpmyadmin/koneksi.php";

$cabang_locations = []; // ini baris 5

if ($db) { // ini baris 6
    $sql = "SELECT id, nama_cabang, alamat, latitude, longitude, gambar_url FROM lokasi_cabang ORDER BY nama_cabang ASC";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cabang_locations[] = $row;
        }
    }
} else {
    echo "Koneksi database gagal.";
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Cabang</title>
    <link rel="stylesheet" href="style_lokasi.css">
</head>
<body>
    
    <div class="container-lokasi">
        <a href="dekstop/menu.php"><h1>LOKASI CABANG</h1></a>
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
                            <img src="image/map-pin.png" alt="Pin Lokasi" class="map-pin-icon">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada data lokasi cabang.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
