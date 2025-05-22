<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'], $_GET['name'], $_GET['price'])) {
    $productId = $_GET['id'];
    $productName = $_GET['name'];
    $productPrice = $_GET['price'];
} else {
    header("Location: index.php?checkout=success");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .product-details {
            margin-bottom: 30px;
        }
        .product-details p {
            margin-bottom: 10px;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <div class="product-details">
            <p><strong>Product Name:</strong> <?php echo $productName; ?></p>
            <p><strong>Price:</strong> $<?php echo $productPrice; ?></p>
        </div>
        <form method="post" action="checkout.php">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
            <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            <input type="submit" value="Proceed to Payment">
        </form>
    </div>
</body>
</html>
