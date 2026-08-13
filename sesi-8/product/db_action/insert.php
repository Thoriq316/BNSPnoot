<?php
require_once '../../connect.php';

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Validasi data
    $errors = [];
    if (empty($name)) {
        $errors['name'] = 'Nama produk harus diisi.';
    }
    if (empty($category)) {
        $errors['category'] = 'Kategori produk harus dipilih.';
    }
    if (empty($price) || !is_numeric($price) || $price < 0) {
        $errors['price'] = 'Harga produk harus berupa angka positif.';
    }
    if (empty($stock) || !is_numeric($stock) || $stock < 0) {
        $errors['stock'] = 'Stok produk harus berupa angka positif.';
    }
    if (empty($image)) {
        $errors['image'] = 'Gambar produk harus diunggah.';
    }

    // Jika tidak ada error, lanjutkan proses simpan
    if (empty($errors)) {
        $upload_dir = '../../uploads/';
        $image_path = $upload_dir . basename($image);

        // Pindahkan file gambar ke folder uploads
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Siapkan query untuk menyimpan data produk
            $sql = "INSERT INTO products (name, category, price, stock, description, image)
                    VALUES (:name, :category, :price, :stock, :description, :image)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':category' => $category,
                ':price' => $price,
                ':stock' => $stock,
                ':description' => $description,
                ':image' => $image
            ]);

            // Redirect ke halaman daftar produk
            header('Location: ../index.php');
            exit();
        } else {
            $errors['image'] = 'Gagal mengunggah gambar produk.';
        }
    }
}
?>
