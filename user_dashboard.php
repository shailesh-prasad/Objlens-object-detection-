<?php
session_start();

// Check if the user is logged in and is a user
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    // If not logged in or not a user, redirect to login page
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome User: " . $_SESSION['username'] . "</h1>";
echo "<p>This is the user dashboard. You can view content here.</p>";

// User options
echo "<ul>
        <li><a href='view_content.php'>View Content</a></li>
        <li><a href='logout.php'>Logout</a></li> <!-- Logout button -->
      </ul>";
?>
