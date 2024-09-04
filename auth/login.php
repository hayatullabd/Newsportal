<?php
include('../config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hashing the password

    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['login_user'] = $username;
        header("location: ../admin/dashboard.php");
    } else {
        $error = "Invalid login credentials.";
    }
}
include('../includes/header.php');
?>
<section id="contact-section">
    <form id="contact-form" action="" method="post">
        <div class="form-control">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-control">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-btn-field">
            <button type="submit" class="btn contact-btn">Login</button>
        </div>
    </form>
    <span><?php echo isset($error) ? $error : ''; ?></span>
</section>
<?php include('../includes/footer.php'); ?>
