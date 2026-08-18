<?php

require_once 'connect.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit();
}

$stmt = $pdo->prepare(
    "SELECT * FROM products WHERE id = :id"
);

$stmt->execute([
    ':id' => $id
]);

$product = $stmt->fetch();

if (!$product) {
    die('Produk tidak ditemukan.');
}

include 'template/header.php';
?>

<h2 class="mb-4">✏️ Edit Produk</h2>

<form
    action="db_action/update.php"
    method="POST"
>

    <input
        type="hidden"
        name="id"
        value="<?= $product['id']; ?>"
    >

    <div class="mb-3">

        <label class="form-label">
            Nama Produk
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="<?= htmlspecialchars($product['name']); ?>"
            required
        >

    </div>


    <div class="mb-3">

        <label class="form-label">
            Kategori
        </label>

        <select
            name="category"
            class="form-select"
            required
        >

            <?php

            $categories = [
                'Laptop',
                'Mouse',
                'Keyboard',
                'Audio',
                'Smartphone',
                'Tablet',
                'Storage',
                'Accessories',
                'Networking',
                'Monitor'
            ];

            foreach ($categories as $category) {

                $selected =
                    $product['category'] === $category
                    ? 'selected'
                    : '';

                echo "
                <option value=\"$category\" $selected>
                    $category
                </option>
                ";
            }

            ?>

        </select>

    </div>


    <div class="mb-3">

        <label class="form-label">
            Harga
        </label>

        <input
            type="number"
            name="price"
            class="form-control"
            value="<?= $product['price']; ?>"
            required
        >

    </div>


    <div class="mb-3">

        <label class="form-label">
            Stok
        </label>

        <input
            type="number"
            name="stock"
            class="form-control"
            value="<?= $product['stock']; ?>"
            required
        >

    </div>


    <div class="mb-3">

        <label class="form-label">
            Deskripsi
        </label>

        <textarea
            name="description"
            class="form-control"
            rows="5"
            required
        ><?= htmlspecialchars($product['description']); ?></textarea>

    </div>


    <button
        type="submit"
        class="btn btn-success"
    >
        Update Produk
    </button>


    <a
        href="index.php"
        class="btn btn-secondary"
    >
        Kembali
    </a>

</form>

<?php include 'template/footer.php'; ?>