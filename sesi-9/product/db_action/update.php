<?php

require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = trim($_POST['description']);

    $sql = "UPDATE products SET
                name = :name,
                category = :category,
                price = :price,
                stock = :stock,
                description = :description
            WHERE id = :id";

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