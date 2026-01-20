<?php
session_start();

// Destroy all session variables
session_destroy();

// Redirect to login form
header("Location: login-form.php");
exit();
?>
