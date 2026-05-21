<?php
include 'config.php';

$id = $_GET['id'];

$query = "SELECT blogs.*, categories.name AS category_name 
          FROM blogs 
          LEFT JOIN categories ON blogs.category_id = categories.id
          WHERE blogs.id='$id'";

$result = mysqli_query($conn, $query);
$blog = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $blog['title']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="blog-detail">
    <a href="index.php" class="back-btn">← Back to Blogs</a>

    <h1><?php echo $blog['title']; ?></h1>

    <p>
        <strong>Category:</strong> <?php echo $blog['category_name']; ?> |
        <strong>Date:</strong> <?php echo $blog['created_at']; ?>
    </p>

    <img src="assets/uploads/<?php echo $blog['image']; ?>" alt="Blog Image">

    <p class="full-content">
        <?php echo $blog['content']; ?>
    </p>
</div>

</body>
</html>

