<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");  // Redirect if not logged in
}

$sql = "SELECT * FROM products WHERE seller_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>
    <a href="upload_product.php">Upload New Product</a>
    <div class="product-list">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="product">
            <img src="<?php echo $row['image']; ?>" alt="Product Image">
            <h3><?php echo $row['product_name']; ?></h3>
            <p><?php echo $row['subtitle']; ?></p>
            <p>Ksh <?php echo $row['price']; ?></p>
            <video width="200" controls>
                <source src="<?php echo $row['video']; ?>" type="video/mp4">
            </video>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
