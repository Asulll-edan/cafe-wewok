<div class="stock-item" data-id="<?php echo $item['id']; ?>">
    <span class="item-name"><?php echo htmlspecialchars($item['nama_item']); ?></span>
    <div class="controls">
        <button class="btn-minus" data-action="minus">-</button>
        <span class="stock-value"><?php echo $item['jumlah_stok']; ?></span>
        <button class="btn-plus" data-action="plus">+</button>
    </div>
</div>
