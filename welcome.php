<?php
session_start();
include "db.php";

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login-form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<h2>Login Successful</h2>

<p><b>Username:</b> <?= $_SESSION['username'] ?></p>
<p><b>Email:</b> <?= $_SESSION['email'] ?></p>
<p><b>Full Name:</b> <?= $_SESSION['fullname'] ?></p>
<p><b>Login Time:</b> <?= $_SESSION['login_time'] ?></p>

<form method="POST" action="login-form.php">
    <button type="submit">Logout</button>
</form>

<hr>

<h3>All Registered Users</h3>

<table border="1">
<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Created At</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['fullname']}</td>
        <td>{$row['email']}</td>
        <td>{$row['username']}</td>
        <td>{$row['created_at']}</td>
    </tr>";
}
?>
</table>

</body>
</html>