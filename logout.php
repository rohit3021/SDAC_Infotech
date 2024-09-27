<?php
session_start();
session_unset(); // Unset all of the session variables
session_destroy(); // Destroy the session
header('Location: logout_success.php'); // Redirect to home after logout
exit();
?>
