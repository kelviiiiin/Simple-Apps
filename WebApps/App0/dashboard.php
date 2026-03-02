<?php
// Create the destination after successful login
session_start();
// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("location: index.html");
    exit;
}
?>
<h1>Welcome!</h1>
<p>You are now logged in!</p>
<a href="logout.php">Logout</a>