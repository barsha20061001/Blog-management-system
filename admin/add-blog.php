<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$categories = mysqli_query($conn, "SELECT * FROM categories");
$message = "";

if (isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $upload_path = "../assets/uploads/" . $image;
    move_uploaded_file($tmp_name, $upload_path);

    $today = date("Y-m-d");

$query = "INSERT INTO blogs (title, short_description, content, category_id, image, created_at)
          VALUES ('$title', '$short_description', '$content', '$category_id', '$image', '$today')";
    

    if (mysqli_query($conn, $query)) {
        $message = "Blog added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <title>Add Blog</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>Add New Blog</h1>

    <a href="dashboard.php">Back to Dashboard</a>

    <p style="color:green;"><?php echo $message; ?></p>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Blog Title" required>

        <textarea name="short_description" placeholder="Short Description" required></textarea>

        <textarea name="content" placeholder="Full Blog Content" required></textarea>

        <select name="category_id" required>
            <option value="">Select Category</option>
            <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                <option value="<?php echo $cat['id']; ?>">
                    <?php echo $cat['name']; ?>
                </option>
            <?php } ?>
        </select>

        <input type="file" name="image" required>

        <button type="submit" name="add_blog">Add Blog</button>
    </form>
</div>

<script>
    CKEDITOR.replace('content');
</script>

</body>
</html>

