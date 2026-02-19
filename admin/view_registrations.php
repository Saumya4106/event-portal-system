<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Event Registrations</h2>
<table class="table table-bordered">
    <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Event</th></tr></thead>
    <tbody>
        <?php
        $query = "SELECT registrations.*, events.title FROM registrations 
                  JOIN events ON registrations.event_id = events.id";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['title']}</td>
                </tr>";
        }
        ?>
    </tbody>
</table>
</div>
</body>
</html>
