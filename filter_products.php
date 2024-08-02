<!-- filter_products.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Filter Products</title>
</head>
<body>
    <form method="POST" action="">
        <label for="min_price">Minimum Price:</label>
        <input type="number" step="0.01" name="min_price" required>
        <input type="submit" name="submit" value="Filter">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dsn = 'mysql:host=localhost;dbname=my_database';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $min_price = $_POST['min_price'];

            $sql = "SELECT * FROM products WHERE price > :min_price";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':min_price', $min_price, PDO::PARAM_STR);
            $stmt->execute();

            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Price</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
