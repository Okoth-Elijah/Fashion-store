<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and assign input data
    $username = htmlspecialchars($_POST["username"]);
    $phone = htmlspecialchars($_POST["Phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $c_pwd = htmlspecialchars($_POST["confirm-password"]); // Corrected key
    $country_code = htmlspecialchars($_POST["country_codes"]);

    // Validate input fields
    if (empty($username) || empty($phone) || empty($email) || empty($pwd) || empty($c_pwd) || empty($country_code)) {
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
        $_SESSION['error_message'] = "Passwords do not match, please confirm your password.";
        header("Location: ../register.php");
        exit();
    }

    // Hash the password for secure storage
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    try {
        require_once "dbh.inc.php";

        // Complete SQL query with placeholders
        $query = "INSERT INTO users (username, phone, email, pwd, country_code) VALUES (:username, :phone, :email, :pwd, :country_code)";

        // Prepare and execute the statement
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $hashed_pwd); // Use hashed password
        $stmt->bindParam(":country_code", $country_code);

        $stmt->execute();

        // Close connection
        $pdo = null;
        $stmt = null;

        // Redirect to login page after successful registration
        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect to register page if accessed directly
    header("Location: ../register.php");
    exit();
}
