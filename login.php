<?php
session_start(); // Start session for user tracking

// Include the database connection file
include('db_connection.php');

if (isset($_POST['submit'])) {
    // Fetch user input from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch user details based on the username
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    // Check if user exists in database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch user data

        // Check if the password matches
        if ($password == $row['password']) {
            // Set session variables for user role and username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role']; // 'admin' or 'user'

            // Redirect user based on their role
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php"); // Redirect to admin page
                exit();
            } else {
                header("Location: user_dashboard.php"); // Redirect to user page
                exit();
            }
        } else {
            // Password doesn't match
            echo "<script>alert('Invalid password! Please try again.');</script>";
        }
    } else {
        // Username not found
        echo "<script>alert('Username not found! Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/objlens/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>
<div class="login-container">
    <h2>Login to ObjLens</h2>
    <form action="login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" name="submit">Login</button>
    </form>
</div>
</body>
</html>
