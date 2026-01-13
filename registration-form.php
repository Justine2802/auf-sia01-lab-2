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
        if(isset($_GET['error'])){
            echo "<p style='color:red'>". $_GET['error'] . "</p>";
        }
        if(isset($_GET['success'])){
            echo "<p style='color:green'>". $_GET['success'] . "</p>";
        }
    ?>
<main>
    <form action="register.php" method="post">
        <h1>Register</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" required placeholder="Username">
        </div>
        <div>
            <label for="username">Full Name:</label>
            <input type="text" name="fullname" required placeholder="Full Name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="Email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required placeholder="Password">
        </div>
    
        <button type="submit">Register</button>
        <footer><a href="login.php">Login here</a></footer>
    </form>
</main>
</body>
</html>