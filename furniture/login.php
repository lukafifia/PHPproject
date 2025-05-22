<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // ინახავს მომხმარებლის ინფორმაციებს
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['role'] = $row['role']; 

            // გადამისამართება index.php
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }

    $conn->close();
}
?>
