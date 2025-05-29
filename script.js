function tampilkanAlert(title, text, icon) {
    Swal.fire({ title, text, icon, confirmButtonText: 'Oke' });
}

document.addEventListener('DOMContentLoaded', () => {
    let perubahanStok = {};

    document.querySelectorAll('.btn-plus, .btn-minus').forEach(button => {
        button.addEventListener('click', () => {
            const itemDiv = button.closest('.stock-item');
            const itemId = itemDiv.dataset.id;
            const stockElem = itemDiv.querySelector('.stock-value');
            let stok = parseInt(stockElem.textContent);
            const aksi = button.dataset.action;

            if (aksi === 'plus') stok++;
            else if (aksi === 'minus') {
                if (stok <= 0) {
                    tampilkanAlert('Stok Habis!', 'Stok tidak bisa kurang dari 0.', 'warning');
                    return;
                }
                stok--;
            }

            stockElem.textContent = stok;
            perubahanStok[itemId] = stok;
        });
    });

    document.getElementById('btn-save').addEventListener('click', async () => {
        const semuaPerubahan = Object.entries(perubahanStok);
        if (semuaPerubahan.length === 0) {
            tampilkanAlert('Tidak ada perubahan.', 'Silakan ubah stok sebelum menyimpan.', 'info');
            return;
        }

        try {
            for (const [id, stokBaru] of semuaPerubahan) {
                const response = await fetch('update_stok.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, newStock: stokBaru })
                });

                const data = await response.json();
                if (!data.success) {
                    console.log('Server response:', data);
                    tampilkanAlert('Gagal!', data.message || `Gagal menyimpan stok untuk ID ${id}.`, 'error');
                    return;
                }
            }

            tampilkanAlert('Berhasil!', 'Semua data stok berhasil diperbarui.', 'success');
            perubahanStok = {};
        } catch (error) {
            tampilkanAlert('Error Jaringan!', 'Tidak bisa terhubung ke server.', 'error');
        }
    });
});
