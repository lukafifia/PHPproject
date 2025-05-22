<?php
session_start();
require 'config.php';

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';


if (!$is_admin) {
    header("Location: index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $image = $_POST['image'];

    $sql = "INSERT INTO furniture (name, price, rating, image) VALUES ('$name', '$price', '$rating', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New furniture added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    
         <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            color: #666;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <h2>Add Furniture</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Price:</label>
        <input type="text" name="price" required><br><br>
        <label>Rating:</label>
        <input type="text" name="rating" required><br><br>
        <label>Image URL:</label>
        <input type="text" name="image" required><br><br>
        <input type="submit" value="Add Furniture">
    </form>
</body>
</html>
