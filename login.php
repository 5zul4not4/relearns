<!DOCTYPE html> 
<html> 
<head> 
    <title>User Login</title> 
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="regstyle.css"> 
</head> 
<body> 
<div class="container"> 
     <div class="fix_head"></div> 
  
     <nav class="navbar"> 
  
         <a href="#"><img src="images/logo.png" class="logo"></a> 
         <ul > 
  
             <li><a href="index.html">Home</a></li> 
             <li><a href="tutor_reg.html">Teachers Signup</a></li> 
             <li><a href="tutor_in.html">Teachers Login</a></li> 
             <li><a href="students_reg.html">Students Signup</a></li> 
             <li><a href="students_in.html">Students Login</a></li> 
             <li><a href="faq.html">Help & Support</a></li> 
             <li><a href="about.html">About us</a></li> 
             <i class="fas fa-times close-icon"></i> 
         </ul> 
         <i class="fas fa-bars menu-icon"></i> 
     </nav> 
 </div>

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } else {
        // Invalid login credentials
        echo "Invalid email/phone or password. Please try again.";
    }
    
    $conn->close();
}
?>

<form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
    <h2>User Login</h2> 
    <div class="form-group"> 
        <label for="email">Email or Phone:</label> 
        <input type="text" id="email" name="email" placeholder="Enter your email or phone" required>       
    </div> 

    <div class="form-group"> 
        <label for="password">Password:</label> 
        <input type="password" id="password" name="password" placeholder="Enter your password" required> 
    </div><br> 
    <div class="form-group"> 
        <center>Forgot your password? <a href=""> click here</a></center> 
    </div> 
    <div class="apply"> 
        <input type="submit" value="Login"> 
        <input type="button" value="Cancel" onclick="window.history.back();"> 
    </div> 
</form> 

<script> 
/* JavaScript for navigation menu */ 
const menuIcon = document.querySelector('.menu-icon'); 
const closeIcon = document.querySelector('.close-icon'); 
const navUl = document.querySelector('nav ul'); 

menuIcon.addEventListener('click', () => { 
    navUl.classList.add('active'); 
    menuIcon.style.display = 'none'; 
    closeIcon.style.display = 'block'; 
}); 

closeIcon.addEventListener('click', () => { 
    navUl.classList.remove('active'); 
    closeIcon.style.display = 'none'; 
    menuIcon.style.display = 'block'; 
}); 
</script> 
</body> 
</html
