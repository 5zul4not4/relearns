<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
    $token = $_GET["token"];
    
    // Verify the token and mark user as confirmed in the database
    if (verifyToken($token)) {
        echo "Registration confirmed! You can now log in.";
    } else {
        echo "Invalid token.";
    }
} else {
    echo "Invalid request.";
}
?>
