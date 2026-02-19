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
    <title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Add New Event</h2>
<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $conn->query("INSERT INTO events(title, description, date, venue) VALUES ('$title','$desc','$date','$venue')");
    echo "<div class='alert alert-success'>Event Added Successfully!</div>";
}
?>
<form method="post">
    <div class="mb-3"><label>Title</label><input type="text" name="title" class="form-control" required></div>
    <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
    <div class="mb-3"><label>Date</label><input type="date" name="date" class="form-control" required></div>
    <div class="mb-3"><label>Venue</label><input type="text" name="venue" class="form-control" required></div>
    <button type="submit" name="submit" class="btn btn-primary">Add Event</button>
</form>
</div>
</body>
</html>
