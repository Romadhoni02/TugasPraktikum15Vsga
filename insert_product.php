<?php
// insert_product.php

$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);

    $name = "Laptop";
    $price = 15000.00;

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);

    $stmt->execute();
    echo "Product inserted successfully.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
