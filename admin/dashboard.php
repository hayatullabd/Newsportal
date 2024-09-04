<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: ../auth/login.php");
    exit;
}

include('../config.php');
include('../includes/header.php');
?>
<section class="section-center">
    <h2 class="section-heading">Admin Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['login_user']; ?>!</p>
    <a href="add-post.php" class="btn">Add New Post</a>
    <a href="../auth/logout.php" class="btn">Logout</a>
</section>
<?php include('../includes/footer.php'); ?>
