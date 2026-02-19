<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Registration Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Upcoming Events</h2>
    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM events");
        while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card p-3 shadow-sm">
                <h4><?php echo $row['title']; ?></h4>
                <p><?php echo $row['description']; ?></p>
                <p><b>Date:</b> <?php echo $row['date']; ?></p>
                <p><b>Venue:</b> <?php echo $row['venue']; ?></p>
                <a href="register.php?event_id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Register</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
