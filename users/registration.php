<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cafe Radiance| Registration Form</title>
        <link rel="stylesheet" href="../assets/css/login.css"/>
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    </head>
    <body>
        <?php
            require('db.php');

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $phone_number = $_POST['phone_number'];

                if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($phone_number)) {
                    echo "<div class='form'>
                            <h3>All fields are required.</h3><br/>
                            <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                        </div>";
                } elseif ($password !== $confirm_password) {
                    echo "<div class='form'>
                            <h3>Passwords do not match.</h3><br/>
                            <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                        </div>";
                } elseif (!preg_match('/^\d{10}$/', $phone_number)) {
                    echo "<div class='form'>
                            <h3>Phone number should be 10 digits long and contain only numbers.</h3><br/>
                            <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                        </div>";
                } else {
                    $query = "INSERT INTO `users` (name, username, password, email, phone_number, create_datetime)
                            VALUES ('$name', '$username', '" . md5($password) . "', '$email', '$phone_number', NOW())";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo "<script>
                                alert('You are registered successfully.');
                                window.location.href = 'login.php';
                            </script>";
                    } else {
                        echo "<div class='form'>
                                <h3>Error registering. Please try again later.</h3><br/>
                                <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                            </div>";
                    }
                }
            }
        ?>
        <form class="form" action="" method="post">
            <center>
                <img src="../assets/images/logo.png" alt="" class="img img-fluid">
            </center>
            <hr />
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="name" placeholder="Name" required />
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="email" class="login-input" name="email" placeholder="Email Address" required>
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="password" class="login-input" name="confirm_password" placeholder="Confirm Password" required>
            <input type="tel" class="login-input" name="phone_number" placeholder="Phone Number" pattern="\d{10}" title="Phone number should be 10 digits long and contain only numbers" required>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link">Already have an account? <a href="login.php">Login here!</a></p>
        </form>
    </body>
</html>
