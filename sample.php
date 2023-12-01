<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data@123";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the 'save' parameter is set in the POST request
if (isset($_POST['save'])) {
    $lname = $_POST['lname'];

    // Use prepared statements to prevent SQL injection
    $sql_query = "INSERT INTO name (lname) VALUES (?)";
    
    $stmt = mysqli_prepare($conn, $sql_query);

    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, "s", $lname);
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    echo "Record inserted successfully";
} else {
    echo "Save parameter not set";
}

// Close the connection
mysqli_close($conn);
?>