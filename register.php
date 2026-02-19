<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register for Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
<?php
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $event = $conn->query("SELECT * FROM events WHERE id=$event_id")->fetch_assoc();
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event_id = $_POST['event_id'];

    if ($conn->query("INSERT INTO registrations(name, email, phone, event_id) VALUES ('$name','$email','$phone',$event_id)")) {
    $reg_id = $conn->insert_id;

    // Optional email confirmation (works if mail() is configured)
    $subject = "Event Registration Confirmation";
    $message = "Hello $name,\n\nThank you for registering for the event '{$event['title']}'.
Date: {$event['date']}
Venue: {$event['venue']}

Your Registration ID: $reg_id

Please show this ID at the event check-in.
\n\nBest Regards,\nEvent Portal Team";

    // Try to send email (won’t break if fails)
    @mail($email, $subject, $message, "From: no-reply@eventportal.com");

    header("Location: confirm.php?reg_id=$reg_id");
    exit();
} else {
    echo "<div class='alert alert-danger'>Error: Could not register. Try again.</div>";
}

}
?>
    <h2 class="mb-3">Register for: <?php echo $event['title']; ?></h2>
    <form method="post">
        <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</body>
</html>
