<?php
// read_products.php

$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);

    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Price</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
