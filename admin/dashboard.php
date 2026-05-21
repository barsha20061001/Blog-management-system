<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['admin']; ?></p>

<a href="add-blog.php">Add New Blog</a>
<br><br>
<a href="logout.php">Logout</a>