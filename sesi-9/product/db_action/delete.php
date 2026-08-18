<?php

require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    // Ambil nama gambar
    $sql = "SELECT image FROM products WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $oldImage = $stmt->fetchColumn();

    // Hapus gambar jika bukan product.jpg
    if (
        $oldImage &&
        $oldImage !== 'product.jpg' &&
        file_exists('../uploads/' . $oldImage)
    ) {

        unlink('../uploads/' . $oldImage);

    }

    // Hapus produk
    $sql = "DELETE FROM products WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header('Location: ../index.php');
    exit();
}
?>