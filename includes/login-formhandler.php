<?php
session_start(); // Ensure session_start() is called

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php?error=emptyfields"); // Redirect with error if fields are empty
        exit();
    }

    try {
        require_once "dbh.inc.php";

        // Check if the user exists in the database
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If the user exists and the password matches
        if ($user && password_verify($pwd, $user["pwd"])) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $user["id"]; // Store user ID in session
            $_SESSION["username"] = $user["username"]; // Store username in session
            
            // Redirect to home page after successful login
            header("Location: ../index.php");
            exit();
        } else {
            // If login failed (wrong email or password)
            header("Location: ../login.php?error=invalidlogin");
            exit();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    echo "Login required";
}
?>
