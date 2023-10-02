<?php
$servername = "localhost"; // Replace with your MySQL server hostname or IP address
$username = "root";
$password = "12345678"; // Replace with your MySQL password
$dbname = "db_leavesystem"; // Replace with your database name

// Receive data sent from Arduino via GET
// if (isset($_GET['temp']) && isset($_GET['humidity']) && isset($_GET['distance']) && isset($_GET['weight']) && isset($_GET['time'])) {
    $log_key = $_GET['key'];



    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current date and time in the 'Asia/Bangkok' time zone
    date_default_timezone_set('Asia/Bangkok');
    $currentDateTime = date("Y-m-d H:i:s");

    // SQL query to insert data into the 'tb_log' table
    $sql = "INSERT INTO tb_log (log_key, log_datetime) VALUES ('$log_key', '$currentDateTime')";
	echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Data recorded successfully";
		include('check_cardemp.php');
    } else {
        echo "Error recording data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
// } else {
   // echo "No data received from Arduino.";
// }
?>
