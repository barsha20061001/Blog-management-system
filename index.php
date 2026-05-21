<?php
include 'config.php';

$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <h1> Blogs</h1>
    <p>Latest updates, jobs, results and admit cards</p>
</header>

<div class="filter-section">
    <input type="text" id="search" placeholder="Search blogs...">

    <select id="category">
        <option value="">All Categories</option>
        <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?php echo $cat['id']; ?>">
                <?php echo $cat['name']; ?>
            </option>
        <?php } ?>
    </select>

    <input type="date" id="date">
</div>

<div id="blog-results" class="blog-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>

