<?php
include 'db.php';

// Get invoice number from GET request
$invoiceNumber = $_GET['invoice_number'];

session_start();

$user = $_SESSION['username'];
$sql1 = "SELECT * FROM users WHERE username = '$user'";
$result = $con->query($sql1);
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
}

// Retrieve order details from database
$sql = "SELECT * FROM orders WHERE invoice_number = '$invoiceNumber' AND user_id = '$id'";
$result = $con->query($sql);
$orderDetails = [];
while ($row = $result->fetch_assoc()) {
    $orderDetails[] = $row;
}

$con->close();

// Return order details as JSON
echo json_encode($orderDetails);
?>
