<?php
session_start(); // Ensure session_start() is called

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php");
        exit();
    }

    // Set session variable after successful login
    $_SESSION["logged_in"] = true; 
    
    // Redirect to home page
    header("Location: ../index.php");
    exit();
} else {
    echo "Login required";
}
?>
