<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    // If not logged in or not an admin, redirect to login page
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS file link -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">ObjLens Admin</div>
        <ul class="nav-links">
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_users.php">View Users</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Dashboard Content -->
    <div class="dashboard-container">
        <h1>Welcome Admin: <?php echo $_SESSION['username']; ?></h1>
        <p>This is your admin dashboard where you can manage users and content.</p>
    </div>

</body>
</html>
<?php