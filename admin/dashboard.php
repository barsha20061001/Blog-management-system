<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT blogs.*, categories.name AS category_name 
          FROM blogs 
          LEFT JOIN categories ON blogs.category_id = categories.id
          ORDER BY blogs.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['admin']; ?></p>

    <a href="add-blog.php">Add New Blog</a>
    <a href="logout.php">Logout</a>

    <h2>All Blogs</h2>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="edit-blog.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete-blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

