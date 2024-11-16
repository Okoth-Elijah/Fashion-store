<?php
session_start(); // Ensure session_start() is called

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $f_name = htmlspecialchars($_POST["f_name"]);
    $l_name = htmlspecialchars($_POST["l_name"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    if (empty($f_name) || empty($l_name) || empty($pwd)) {
        header("Location: ../login.php");
        exit();
    }

    // Set session variable after successful login
    $_SESSION["logged_in"] = true; 
    $_SESSION["user_name"] = $f_name;  // Optionally store the user's name

    // Redirect to home page
    header("Location: ../index.php");
    exit();
} else {
    echo "Login required";
}
?>
