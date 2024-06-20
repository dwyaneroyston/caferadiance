<?php
require('db.php');

session_start();


    // Check if the user exists in the database
    $query = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        // Insert the user into the database
        $query = "INSERT INTO `users` (username, email) VALUES ('$username', '$email')";
        mysqli_query($con, $query);
    }
    
    // Set the user session
    $_SESSION['username'] = $username;
    
    echo 'success';
 else {
    echo 'error';
}
?>