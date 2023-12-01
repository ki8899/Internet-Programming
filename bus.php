<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $passenger_name = $_POST['passenger_name'];
    $bus_number = $_POST['bus_number'];
    $seat_number = $_POST['seat_number'];
    $departure_time = $_POST['departure_time'];

    $sql = "INSERT INTO bookings (passenger_name, bus_number, seat_number, departure_time)
            VALUES ('$passenger_name', '$bus_number', '$seat_number', '$departure_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>