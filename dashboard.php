<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['admin']; ?> 👋</h2>
    <a href="add_event.php" class="btn btn-success mt-3">Add New Event</a>
    <a href="view_registrations.php" class="btn btn-info mt-3">View Registrations</a>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>
