<?php
require_once '../config/database.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock, description=:description WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':category' => $category,
        ':price' => $price,
        ':stock' => $stock,
        ':description' => $description,
        ':id' => $id
    ]);
    header('Location: ../index.php');
    exit();
}
?>

<?php include '../header.php'; ?>
<h2>Edit Produk</h2>
<form method="POST" class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" value="<?= $product['category']; ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" value="<?= $product['price']; ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" value="<?= $product['stock']; ?>">
    </div>
    <div class="col-md-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control"><?= $product['description']; ?></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Update Produk</button>
    </div>
</form>
<?php include '../footer.php'; ?>
