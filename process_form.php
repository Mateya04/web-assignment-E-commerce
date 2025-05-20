<?php
// Database connection
$servername = "localhost"; // MySQL host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (leave empty if none)
$dbname = "web_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Store password as plain text (not recommended)
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO applicants (first_name, last_name, email, password, phone)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: success.html"); // Redirect to a success page after submission
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
