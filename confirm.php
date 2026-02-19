<?php
include 'db.php';

if (!isset($_GET['reg_id'])) {
    header("Location: index.php");
    exit();
}

$reg_id = $_GET['reg_id'];
$query = "SELECT r.*, e.title, e.date, e.venue 
          FROM registrations r
          JOIN events e ON r.event_id = e.id
          WHERE r.id = $reg_id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "<h3>Invalid Registration ID!</h3>";
    exit();
}

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center text-success mb-4">✅ Registration Successful!</h3>
        <p><strong>Registration ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
        <hr>
        <p><strong>Event:</strong> <?php echo $row['title']; ?></p>
        <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
        <p><strong>Venue:</strong> <?php echo $row['venue']; ?></p>
        <hr>
        <p>Show this page or note down your Registration ID for event entry.</p>
        <a href="index.php" class="btn btn-primary mt-3">Back to Events</a>
    </div>
</div>
</body>
</html>
