<?php
// delete_product.php

$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $id = 2;

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    echo "Product deleted successfully.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
