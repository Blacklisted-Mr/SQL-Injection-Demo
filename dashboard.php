<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$username = $_SESSION['username'];
$query = $_SESSION['query'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Welcome!</h2>
        <p>Logged in as: <strong><?php echo htmlspecialchars($username); ?></strong></p>
        <button onclick="alert('SQL Query Executed:\n<?php echo addslashes($query); ?>')">Show SQL Query</button>
        <a href="logout.php" style="display: block; margin-top: 20px;">Logout</a>
    </div>
</body>
</html>
