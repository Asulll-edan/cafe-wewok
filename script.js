// script.js

// Fungsi untuk menampilkan SweetAlert
function tampilkanAlert(title, text, icon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: 'Oke'
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Tangani event click pada tombol plus atau minus
    document.querySelectorAll('.btn-plus, .btn-minus').forEach(button => {
        button.addEventListener('click', async () => { // Gunakan async/await untuk fetch
            const stockItemDiv = button.closest('.stock-item');
            const itemId = stockItemDiv.dataset.id; // Ambil ID item dari data-id
            const stockValueElement = stockItemDiv.querySelector('.stock-value');
            let currentStock = parseInt(stockValueElement.textContent);
            const action = button.dataset.action; // plus atau minus

            let newStock;
            if (action === 'plus') {
                newStock = currentStock + 1;
            } else if (action === 'minus') {
                if (currentStock <= 0) {
                    tampilkanAlert('Stok Habis!', 'Stok tidak bisa kurang dari 0.', 'warning');
                    return; // Hentikan fungsi jika stok sudah 0
                }
                newStock = currentStock - 1;
            }

            // Kirim permintaan update ke PHP backend
            try {
                const response = await fetch('update_stok.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: itemId,
                        newStock: newStock
                    })
                });

                const data = await response.json();

                if (data.success) {
                     // Update tampilan stok di halaman jika berhasil
                    stockValueElement.textContent = newStock;
                    tampilkanAlert('Berhasil!', 'Data stok telah diperbarui.', 'success');
                } else {
                    tampilkanAlert('Gagal!', data.message || 'Terjadi kesalahan saat memperbarui stok.', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                 tampilkanAlert('Error Jaringan!', 'Tidak dapat terh ubung ke server.', 'error');
             }
        });
    });
});                 