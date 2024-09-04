<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: ../auth/login.php");
    exit;
}

include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if (mysqli_query($connection, $query)) {
        header("location: dashboard.php");
    } else {
        echo "ERROR: Could not execute $query. " . mysqli_error($connection);
    }
}

include('../includes/header.php');
?>
<form action="" method="post">
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Content:</label>
    <textarea name="content" required></textarea>
    <input type="submit" value="Add Post">
</form>
<?php include('../includes/footer.php'); ?>
