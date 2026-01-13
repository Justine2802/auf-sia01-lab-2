<?php
include "db.php";

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if username already exists
    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        header("Location: registration-form.php?error=Username already exist");
    }

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        header("Location: registration-form.php?error=Email already exist");
    }
    //PASSWORD HASHED
    $hashed = password_hash($password,PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (fullname, email, username, passwd) VALUES(?, ?, ?, ?)");
    $insert->bind_param("ssss", $fullname, $email, $username, $hashed);

    if ($insert->execute()){
        header("Location: registration-form.php?success=Registration Successful");
    }else{
        header("Location: registration-form.php?error=Registration Failed");
    }

    error_log("REGISTRATION_SUCCESS: User'$username' registered successfully");
    
    
?>