<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Cafe Radiance| Login Form</title>
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico"><!-- Favicon / Icon -->
</head>
<body>
    <?php
        require('db.php');
        session_start();
        
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);
            
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo "<div class='form'>
                    <h3>Incorrect Username/password.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
            }
        }
    ?>
    <form class="form" method="post" name="login">
    <center>
        <img src="../assets/images/logo.png" alt="" class="img img-fluid">
    </center>
    <hr />
    <h1 class="login-title">Login</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required/>
    <input type="password" class="login-input" name="password" placeholder="Password" required/>
    <input type="submit" value="Login" name="submit" class="login-button"/>
    <p class="link">Don't have an account? <a href="registration.php">Register here!</a></p>
    <hr />
</form>

</body>
</html>
