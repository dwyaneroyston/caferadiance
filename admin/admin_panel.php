<?php
// Start session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Check if logout button is clicked
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="adminstyle.css">
    <script>
        // JavaScript function to show confirmation popup before logout
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                // If user confirms, submit the form
                document.getElementById("navigationForm").submit();
            } else {
                // If user cancels, prevent form submission
                event.preventDefault();
                return false;
            }
        }

        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</head>
<body>
<div class="sidebar">
    <img src="..\assets\images\logo.png" alt="Sidebar Image">
    <form id="navigationForm" method="post">
        <button type="submit" name="showUsers">Users</button>
        <button type="submit" name="showOrders">Orders</button>
        <button type="submit" name="showReservations">Reservations</button>
        <button type="submit" name="newAdmin">Add Admin</button>
        <button type="submit" name="logout" onclick="confirmLogout()">Logout</button>
    </form>
</div>

<div class="content">
    <h1>Admin Panel - Cafe Radiance</h1>
    <div id="userData">
        <?php
        include_once 'db.php';

        // Function to fetch and display user data
        function displayUserData()
        {
            global $con;
            // Fetch users from the database
            $users_query = "SELECT * FROM users";
            $users_result = mysqli_query($con, $users_query);

            // Display users in a table
            if (mysqli_num_rows($users_result) > 0) {
                echo "<h2>Users</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Username</th><th>Email</th><th>Phone Number</th><th>Created Datetime</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($users_result)) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone_number'] . "</td><td>" . $row['create_datetime'] . "</td><td><form method='post' onsubmit='return confirmDelete();'><input type='hidden' name='user_id' value='" . $row['id'] . "'><input type='submit' name='delete_user' value='Delete' class='delete-btn'></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "No users found";
            }
        }

        // Check if the delete button is clicked
        if (isset($_POST['delete_user'])) {
            // Get the user ID to be deleted
            $user_id = $_POST['user_id'];

            // Delete the user from the database
            $delete_query = "DELETE FROM users WHERE id = $user_id";
            mysqli_query($con, $delete_query);

            // Redirect to avoid duplicate form submissions
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        }

        // Function to fetch and display order data
        function displayOrderData()
        {
            global $con;
            // Fetch orders from the database
            $orders_query = "SELECT * FROM orders";
            $orders_result = mysqli_query($con, $orders_query);

            // Display orders in a table
            if (mysqli_num_rows($orders_result) > 0) {
                echo "<h2>Orders</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Price</th><th>Title</th><th>Quantity</th><th>Subtotal Amount</th><th>Date</th><th>Invoice Number</th><th>User ID</th></tr>";
                while ($row = mysqli_fetch_assoc($orders_result)) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['price'] . "</td><td>" . $row['title'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['subtotal_amount'] . "</td><td>" . $row['date'] . "</td><td>" . $row['invoice_number'] . "</td><td>" . $row['user_id'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No orders found";
            }
        }

        // Display user or order data based on button click
        if (isset($_POST['showUsers'])) {
            displayUserData();
        } elseif (isset($_POST['showOrders'])) {
            displayOrderData();
        }

        // Function to fetch and display reservation data
        function displayReservationData()
        {
            global $con;
            // Fetch reservations from the database
            $reservations_query = "SELECT * FROM reservations";
            $reservations_result = mysqli_query($con, $reservations_query);

            // Display reservations in a table
            if (mysqli_num_rows($reservations_result) > 0) {
                echo "<h2>Reservations</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>User ID</th><th>Date</th><th>Time</th><th>Number of Guests</th></tr>";
                while ($row = mysqli_fetch_assoc($reservations_result)) {
                    echo "<tr><td>" . $row['reservation_id'] . "</td><td>" . $row['user_id'] . "</td><td>" . $row['reservation_date'] . "</td><td>" . $row['reservation_time'] . "</td><td>" . $row['num_guests'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No reservations found";
            }
        }

        // Display reservation data when the corresponding button is clicked
        if (isset($_POST['showReservations'])) {
            displayReservationData();
        }

        function displayAddAdminForm()
        {
            echo "<div class='add-admin-form'>";
            echo "<h2>Add Admin</h2>";
            echo '<form method="post" action="">
            <label for="adminUsername">Username:</label>
            <input type="text" name="adminUsername" required>
            <label for="adminPassword">Password:</label>
            <input type="password" name="adminPassword" required>
            <button type="submit" name="submitAddAdmin">Add Admin</button>
          </form>';
            echo "</div>";
        }

        // Check if the "Add Admin" form is submitted
        if (isset($_POST['submitAddAdmin'])) {
            // Get admin username and password from the form
            $adminUsername = $_POST['adminUsername'];
            $adminPassword = $_POST['adminPassword'];

            // Insert admin details into the database
            $sql = "INSERT INTO admin (username, password) VALUES ('$adminUsername', '$adminPassword')";
            if (mysqli_query($con, $sql)) {
                echo "New admin added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }

        // Check if the "Add Admin" button is clicked
        if (isset($_POST['newAdmin'])) {
            displayAddAdminForm();
        }

        // Close database connection
        mysqli_close($con);
        ?>
    </div>
</div>
</body>
</html>
