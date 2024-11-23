<?php
include 'db.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $subtitle = $_POST['subtitle'];
    $price = $_POST['price'];
    $payment_number = $_POST['payment_number'];

    // Handle image and video upload
    $image = $_FILES['product_image']['name'];
    $video = $_FILES['product_video']['name'];
    $target_image = "uploads/" . basename($image);
    $target_video = "uploads/" . basename($video);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_image) && 
        move_uploaded_file($_FILES['product_video']['tmp_name'], $target_video)) {
        
        $sql = "INSERT INTO products (product_name, subtitle, price, payment_number, image, video) 
                VALUES ('$product_name', '$subtitle', '$price', '$payment_number', '$target_image', '$target_video')";

        if ($conn->query($sql) === TRUE) {
            echo "Product uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading files!";
    }

    $conn->close();
}
?>
