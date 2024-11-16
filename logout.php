<?php
session_start(); // Start session at the very top


// Start session and destroy the session
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redirect to homepage after logging out
exit();

