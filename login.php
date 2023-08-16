<?php

 // Connect to the database
$host = 'localhost';
$username = 'id21034020_relearns';
$dbpassword = '0nlineDb.';
$database = 'id21034020_relearns';
$conn = mysqli_connect($host, $username, $dbpassword, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted login credentials
$emailPhone = $_POST['email'];
$pass = $_POST['password'];

// Check if input is an email or phone number
if (filter_var($emailPhone, FILTER_VALIDATE_EMAIL)) {
    // Input is an email, query the database table
    $sql = "SELECT * FROM user WHERE email = '$emailPhone' AND password = '$pass'";
} else {
    // Input is not an email, assume it's a phone number and query the database table
    $sql = "SELECT * FROM user WHERE phone = '$emailPhone' AND password = '$pass'";
}

// Execute the query
$result = $conn->query($sql);

// Check if login credentials match
if ($result->num_rows > 0) {
    // Login successful
    $row = $result->fetch_assoc();
        
        echo "Tutor Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
        echo "Gender: " . $row['gender'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Phone: " . $row['phone'] . "<br>";
        echo "Class you can teach: " . $row['interest'] . "<br>";
        echo "Subject: " . $row['subject'] . "<br><br>";
        echo "Hello tutor, please wait for student requests. We will update you here.<br>";
        echo "Thank you!";
    
    //header("Location: user_login_successful.html?email=$userEmail");
} else {
    // Invalid login credentials
    echo "Invalid email/phone or password. Please try again.";
}

$conn->close();
?>
