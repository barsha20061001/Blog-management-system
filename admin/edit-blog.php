<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$blog_query = mysqli_query($conn, "SELECT * FROM blogs WHERE id='$id'");
$blog = mysqli_fetch_assoc($blog_query);

$categories = mysqli_query($conn, "SELECT * FROM categories");

$message = "";

if (isset($_POST['update_blog'])) {

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    if ($_FILES['image']['name'] != "") {

        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, "../assets/uploads/" . $image);

    } else {

        $image = $blog['image'];
    }

    $update_query = "UPDATE blogs SET
        title='$title',
        short_description='$short_description',
        content='$content',
        category_id='$category_id',
        image='$image'
        WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        $message = "Blog updated successfully!";
    } else {
        $message = "Update failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">

    <h1>Edit Blog</h1>

    <a href="dashboard.php">Back to Dashboard</a>

    <p style="color:green;"><?php echo $message; ?></p>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="title"
        value="<?php echo $blog['title']; ?>" required>

        <textarea name="short_description" required><?php echo $blog['short_description']; ?></textarea>

        <textarea name="content" required><?php echo $blog['content']; ?></textarea>

        <select name="category_id" required>

            <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>

                <option value="<?php echo $cat['id']; ?>"
                    <?php if($cat['id'] == $blog['category_id']) echo "selected"; ?>>

                    <?php echo $cat['name']; ?>

                </option>

            <?php } ?>

        </select>

        <p>Current Image:</p>

        <img src="../assets/uploads/<?php echo $blog['image']; ?>"
        width="120">

        <br><br>

        <input type="file" name="image">

        <br><br>

        <button type="submit" name="update_blog">
            Update Blog
        </button>

    </form>

</div>

<script>
    CKEDITOR.replace('content');
</script>

</body>
</html>