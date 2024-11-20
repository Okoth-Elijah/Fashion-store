<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and assign input data
    $f_name = htmlspecialchars($_POST["f_name"]);
    $l_name = htmlspecialchars($_POST["l_name"]);
    $phone = htmlspecialchars($_POST["Phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $c_pwd = htmlspecialchars($_POST["confirm-password"]); // Corrected key
    $country_code = htmlspecialchars($_POST["country_codes"]);

    // Validate input fields
    if (empty($f_name) || empty($l_name) || empty($phone) || empty($email) || empty($pwd) || empty($c_pwd) || empty($country_code)) {
        echo "
        <script>
         alert('All fields must be filled!');
         window.location.href = '../register.php';
        </script>";
        exit(); // Stop execution if fields are missing
    }

    // Validate password confirmation
    if ($pwd !== $c_pwd) {
      session_start();
      $_SESSION['error_message'] = "Password does not match, please confirm your password.";
      header("Location: ../register.php");
      exit();
  }
  

    // If all validations pass, redirect to login page
    header("Location: ../login.php");
    exit();
} else {
    // Redirect to register page if accessed directly
    header("Location: ../register.php");
    exit();
}
