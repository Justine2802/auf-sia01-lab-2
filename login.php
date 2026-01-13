<?php
session_start();
include "db.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == "" || $password == "") {
    $_SESSION['error'] = "All fields are required";
    header("Location: login-form.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: login-form.php");
    exit();
}

$user = $result->fetch_assoc();

if (!password_verify($password, $user['passwd'])) {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: login-form.php");
    exit();
}

$_SESSION['is_logged_in'] = true;
$_SESSION['username'] = $user['username'];
$_SESSION['email'] = $user['email'];
$_SESSION['fullname'] = $user['fullname'];
$_SESSION['login_time'] = date("Y-m-d H:i:s");

header("Location: welcome.php");
exit();

    error_log("LOGIN_SUCCESS: User'$username' LOGIN SUCCESFULLY");
    error_log("LOGIN_FAILED: User'$username' LOGIN FAILED");
?>