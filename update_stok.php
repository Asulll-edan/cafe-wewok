<?php
// update_stock.php

// Sertakan file koneksi database
include 'koneksi.php';

header('Content-Type: application/json'); // Beri tahu browser bahwa respons ini adalah JSON

// Ambil data yang dikirim dari JavaScript (JSON)
$data = json_decode(file_get_contents('php://input'), true);

$response = ['success' => false, 'message' => ''];

if (isset($data['id']) && isset($data['newStock'])) {
    $itemId = $data['id'];
    $newStock = $data['newStock'];

    // Validasi input (penting untuk keamanan!)
    if (!is_numeric($itemId) || !is_numeric($newStock) || $newStock < 0) {
        $response['message'] = 'Input tidak valid.';
        echo json_encode($response);
        $conn->close();
        exit();
    }

    // Gunakan Prepared Statements untuk mencegah SQL Injection (PENTING!)
    $stmt = $conn->prepare("UPDATE stok_barang SET jumlah_stok = ? WHERE id = ?");
    $stmt->bind_param("ii", $newStock, $itemId); // "ii" berarti dua integer

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Stok berhasil diperbarui.';
    } else {
        $response['message'] = 'Gagal memperbarui stok: ' . $conn->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Data tidak lengkap.';
}

echo json_encode($response); // Kirim respons dalam format JSON

$conn->close(); // Tutup koneksi database
?>