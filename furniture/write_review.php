<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['user_name'], $_POST['rating'], $_POST['comment'])) {
    $productId = $_POST['product_id'];
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (product_id, user_name, rating, comment) VALUES ('$productId', '$userName', '$rating', '$comment')";
    if ($conn->query($sql) === TRUE) {
        $confirmationMessage = 'Your review has been submitted successfully!';
    } else {
        $errorMessage = 'Error submitting review: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Review</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success-message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            color: #3c763d;
            border-radius: 5px;
        }
        .error-message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Write a Review</h2>
        <?php if (isset($confirmationMessage)): ?>
            <div class="success-message"><?php echo $confirmationMessage; ?></div>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form method="post" action="write_review.php">
            <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
            <label for="user_name">Your Name:</label>
            <input type="text" id="user_name" name="user_name" required>
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1 star</option>
                <option value="2">2 stars</option>
                <option value="3">3 stars</option>
                <option value="4">4 stars</option>
                <option value="5">5 stars</option>
            </select>
            <label for="comment">Your Review:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
            <input type="submit" value="Submit Review">
        </form>
    </div>
</body>
</html>
