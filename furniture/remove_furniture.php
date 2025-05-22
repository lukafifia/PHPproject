<?php
session_start();
include 'config.php';

//amowmebs admins
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    

    $sql = "SELECT image FROM furniture WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image'];

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $sql = "DELETE FROM furniture WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Furniture removed successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No furniture found with the provided ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Furniture</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="container">
        <h1>Remove Furniture</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="id">Furniture ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <button type="submit" class="btn">Remove Furniture</button>
        </form>
    </div>
</body>
</html>
