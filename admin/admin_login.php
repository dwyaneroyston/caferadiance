<?php
session_start();

// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to retrieve admin credentials
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Admin found, verify password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
            $_SESSION["admin_logged_in"] = true;
            header("Location: admin_panel.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="login-container">
        <form class="form" method="post" name="login">
            <center>
                <img src="../assets/images/logo.png" alt="" class="img img-fluid">
            </center>
            <hr />
            <h1 class="login-title">Admin Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/ required>
            <input type="password" class="login-input" name="password" placeholder="Password" required />
            <input type="submit" value="Login" name="submit" class="login-button"/>
            <a href="../index.php" class="home-button">Home</a>
            
            <?php if(isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
