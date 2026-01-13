<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
    <?php
       if(!empty($_SESSION['error'])){
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        $_SESSION['error'] = "";
       }
    ?>
<main>
    <form action="login.php" method="post">
            <h1>Log-In</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" required placeholder="Username">
        </div>
        <div>
            <label for="username">Password:</label>
            <input type="password" name="password" required placeholder="Password">
        </div>
            <button type="submit">Login</button>
            <footer><a href="registration-form.php">Register here</a></footer>
    </form>
</main>
</body>
</html>