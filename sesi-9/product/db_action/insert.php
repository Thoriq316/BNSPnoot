<?php

require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = trim($_POST['description']);

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (
        empty($name) ||
        empty($category) ||
        empty($price) ||
        empty($stock) ||
        empty($description) ||
        empty($image)
    ) {

        die('Semua data wajib diisi.');

    }

    $upload_dir = '../uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $extension = pathinfo($image, PATHINFO_EXTENSION);

    $newImageName = uniqid('product_') . '.' . $extension;

    $image_path = $upload_dir . $newImageName;

    if (move_uploaded_file($image_tmp, $image_path)) {

        $sql = "INSERT INTO products
                (name, description, price, stock, image, category)
                VALUES
                (:name, :description, :price, :stock, :image, :category)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':stock' => $stock,
            ':image' => $newImageName,
            ':category' => $category
        ]);

        header('Location: ../index.php');
        exit();

    } else {

        die('Gagal mengupload gambar.');

    }
}
?>