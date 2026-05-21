<?php
include '../config.php';

$search = $_POST['search'] ?? '';
$category = $_POST['category'] ?? '';
$date = $_POST['date'] ?? '';

$query = "SELECT blogs.*, categories.name AS category_name 
          FROM blogs 
          LEFT JOIN categories ON blogs.category_id = categories.id 
          WHERE 1";

if ($search != '') {
    $query .= " AND blogs.title LIKE '%$search%'";
}

if ($category != '') {
    $query .= " AND blogs.category_id = '$category'";
}

if ($date != '') {
    $query .= " AND blogs.created_at = '$date'";
}

$query .= " ORDER BY blogs.id DESC";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="blog-card">
    <img src="assets/uploads/<?php echo $row['image']; ?>" alt="Blog Image">

    <div class="blog-content">
        <span class="category"><?php echo $row['category_name']; ?></span>
        <h2><?php echo $row['title']; ?></h2>
        <p><?php echo $row['short_description']; ?></p>
        <small>Date: <?php echo $row['created_at']; ?></small>
        <br>
        <a href="blog.php?id=<?php echo $row['id']; ?>" class="read-more">Read More</a>
    </div>
</div>

<?php
    }
} else {
    echo "<div class='empty-state'>No blogs found. Try another search or category.</div>";
}
?>

