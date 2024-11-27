<?php
// Start the session at the very top
session_start();

// Destroy all session variables to log the user out
session_unset();
session_destroy();

// Redirect to the login page after logging out
header("Location: login.php");
exit();
?>
