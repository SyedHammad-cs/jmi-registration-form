<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$dbname = "jmi_registration";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $father_name = $_POST['father-name'];
    $mother_name = $_POST['mother-name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
    $mobile = $_POST['mobile'];
    $captcha = $_POST['captcha'];

    // Insert data into the database
    $sql = "INSERT INTO applicants (email, first_name, last_name, dob, gender, father_name, mother_name, password, mobile, captcha)
            VALUES ('$email', '$first_name', '$last_name', '$dob', '$gender', '$father_name', '$mother_name', '$password', '$mobile', '$captcha')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
