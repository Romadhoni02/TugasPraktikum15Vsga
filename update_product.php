<?php
// update_product.php

$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE products SET price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $id = 1;
    $price = 17500.00;

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);

    $stmt->execute();
    echo "Product updated successfully.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
