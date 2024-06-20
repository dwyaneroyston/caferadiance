<?php
session_start();
include 'db.php';

// Function to retrieve user ID by username
function getUserIdByUsername($username) {
    global $con; // Assuming $con is your database connection object
    
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null; // User not found
    }
}

// Function to redirect to login page
function redirectToLogin() {
    header("Location: login.php");
    exit();
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    redirectToLogin();
}

// Retrieve user ID
$username = $_SESSION['username'];
$user_id = getUserIdByUsername($username);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $num_guests = $_POST['num_guests'];
    
    // Check if the selected date and time is available
    $sql_check_availability = "SELECT COUNT(*) AS total_reservations FROM reservations WHERE reservation_date = '$reservation_date' AND reservation_time = '$reservation_time'";
    $result_availability = $con->query($sql_check_availability);
    $row_availability = $result_availability->fetch_assoc();
    $total_reservations = $row_availability['total_reservations'];
    
    // Assuming you have a fixed number of tables available
    $total_tables = 10; // Change this according to your actual table count
    
    if ($total_reservations >= $total_tables) {
        echo "Sorry, no tables available for the selected date and time. Please choose a different date or time.";
        exit();
    }

    // Check if the selected date and time is already booked
    $sql_check_booking = "SELECT COUNT(*) AS existing_bookings FROM reservations WHERE reservation_date = '$reservation_date' AND reservation_time = '$reservation_time'";
    $result_booking = $con->query($sql_check_booking);
    $row_booking = $result_booking->fetch_assoc();
    $existing_bookings = $row_booking['existing_bookings'];
    
    if ($existing_bookings > 0) {
        echo "Sorry, the selected date and time is already booked. Please choose a different time slot.";
        exit();
    }

    // Insert reservation into the database
    $sql_insert = "INSERT INTO reservations (user_id, reservation_date, reservation_time, num_guests) 
                   VALUES ('$user_id', '$reservation_date', '$reservation_time', '$num_guests')";
    
    if ($con->query($sql_insert) === TRUE) {
        $reservation_success = true;
    } else {
        echo "Error: " . $sql_insert . "<br>" . $con->error;
    }

    // Close database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        body {
            background: #FEFBF6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form {
            margin: 50px auto;
            width: 500px;
            padding: 30px 25px;
            background: white;
        }

        h2 {
            color: #666;
            margin: 0 auto 25px;
            font-size: 25px;
            font-weight: 300;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="date"],
        input[type="number"] {
            font-size: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 25px;
            height: 25px;
            width: calc(100% - 23px);
        }

        input[type="submit"],
        .time-slot,
        .view-reservations-button {
            color: #fff;
            background: #9F5C44;
            border: 0;
            outline: 0;
            width: 100%;
            height: 50px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 15px;
            display: inline-block;
            text-decoration: none;
            line-height: 50px;
        }

        input[type="submit"]:hover,
        .time-slot:hover,
        .view-reservations-button:hover {
            background-color: #64342C;
            letter-spacing: .2rem;
        }

        .time-slot.selected {
            background-color: #C69774; /* Change the color as desired */
        }

        /* New CSS for the time slots container */
        .time-slots-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Adjust the number of columns as needed */
            gap: 10px; /* Adjust the gap between buttons */
        }

        img {
            max-width: 150px;
            max-height: 150px;
            display: block;
            margin: 0 auto 30px;
            border: 5px solid #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        /* Center align div */
        .center-div {
            text-align: center;
            margin-top: 20px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="form">
        <img src="../assets/images/logo.png" alt="Logo">
        <h2>Lock in Your Reservation!</h2>
        <?php if(isset($reservation_success) && $reservation_success) { ?>
            <div class="center-div">
                <p>Reservation Successful!</p>
                <p>Date: <?php echo $reservation_date; ?></p>
                <p>Time: <?php echo $reservation_time; ?></p>
                <p>Number of Guests: <?php echo $num_guests; ?></p>
                <button onclick="window.print()">Print Bill</button>
            </div>
        <?php } else { ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="reservation_date">Date:</label>
                <input type="date" id="reservation_date" name="reservation_date" required><br><br>

                <!-- Container for time slots buttons -->
                <div class="time-slots-container">
                    <?php
                    // Generate time slots with 45-minute intervals from 4 PM to 10 PM
                    $start_time = strtotime('4:00 PM');
                    $end_time = strtotime('10:00 PM');
                    $interval = 45 * 60; // 45 minutes in seconds

                    // Loop through time intervals and generate buttons
                    for ($time = $start_time; $time <= $end_time; $time += $interval) {
                        echo '<button type="button" class="time-slot" onclick="selectTime(this)" data-time="' . date('h:i A', $time) . '">' . date('h:i A', $time) . '</button>';
                    }
                    ?>
                </div>

                <input type="hidden" id="reservation_time" name="reservation_time" required>

                <label for="num_guests">Number of Guests:</label>
                <input type="number" id="num_guests" name="num_guests" required><br><br>

                <input type="submit" value="Book Table">
                <button type="button" class="view-reservations-button" onclick="showReservations()">View Reservations</button>
            </form>
        <?php } ?>
    </div>

    <div id="user-reservations" style="display: none;">
        <h2>My Reservations</h2>
        
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Number of Guests</th>
            </tr>
            <?php
            $sql_user_reservations = "SELECT * FROM reservations WHERE user_id = '$user_id'";
            $result_user_reservations = $con->query($sql_user_reservations);
            if ($result_user_reservations->num_rows > 0) {
                while($row = $result_user_reservations->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['reservation_date'] . "</td>";
                    echo "<td>" . $row['reservation_time'] . "</td>";
                    echo "<td>" . $row['num_guests'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No reservations found.</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        function selectTime(button) {
            // Remove 'selected' class from all buttons
            var buttons = document.getElementsByClassName('time-slot');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('selected');
            }

            // Add 'selected' class to the clicked button
            button.classList.add('selected');

            // Set the value of the hidden input field
            document.getElementById("reservation_time").value = button.getAttribute("data-time");
        }

        function showReservations() {
            var reservationsDiv = document.getElementById('user-reservations');
            if (reservationsDiv.style.display === 'none') {
                reservationsDiv.style.display = 'block';
            } else {
                reservationsDiv.style.display = 'none';
            }
        }
    </script>
</body>
</html>
