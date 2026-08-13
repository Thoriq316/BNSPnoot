<?php include 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">📦 Daftar Produk</h2>
    <a href="add.php" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
</div>

<!-- Form Filter Kategori -->
<form method="GET" class="d-flex mb-3">
    <select name="category" class="form-select w-auto me-2">
        <option value="">Semua Kategori</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Fashion">Fashion</option>
        <option value="Makanan">Makanan</option>
        <option value="Aksesoris">Aksesoris</option>
    </select>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-funnel"></i> Filter
    </button>
</form>

<table class="table table-hover table-bordered shadow-sm align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'config/database.php';
        $category = $_GET['category'] ?? '';

        // Query dengan filter kategori
        if ($category) {
            $stmt = $pdo->prepare("SELECT * FROM products WHERE category = :category");
            $stmt->execute([':category' => $category]);
        } else {
            $stmt = $pdo->query("SELECT * FROM products");
        }

        foreach ($stmt as $product) {
            echo "<tr>
                    <td class='text-center'>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td class='text-end'>Rp" . number_format($product['price'], 0, ',', '.') . "</td>
                    <td>{$product['description']}</td>
                    <td class='text-center'><img src='uploads/{$product['image']}' width='80' class='rounded shadow-sm'></td>
                    <td class='text-center'>{$product['stock']}</td>
                    <td>{$product['category']}</td>
                    <td class='text-center'>
                        <a href='db_action/edit.php?id={$product['id']}' class='btn btn-sm btn-warning me-1'>
                            <i class='bi bi-pencil-square'></i> Edit
                        </a>
                        <a href='db_action/delete.php?id={$product['id']}' class='btn btn-sm btn-danger'
                           onclick=\"return confirm('Yakin ingin hapus produk ini?');\">
                           <i class='bi bi-trash'></i> Delete
                        </a>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
