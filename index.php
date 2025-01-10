<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Allow SQL injection testing
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $query_executed = $sql;

    if (mysqli_num_rows($result) > 0) {
        // Fetch the first user from the database
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['query'] = $query_executed;
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (!empty($error_message)) echo "<p class='alert'>$error_message</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <a href="register.php">New User? Register</a>
    </div>
</body>
</html>
