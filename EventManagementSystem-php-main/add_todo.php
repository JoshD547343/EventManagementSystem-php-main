<?php
include './database/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_status = $_POST['event_status'];

    $stmt = $conn->prepare("INSERT INTO events (title, description, event_status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $event_status);

    if ($stmt->execute()) {
        echo "<script>alert('Event added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error adding event: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Event</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="./statics/js/bootstrap.js"></script>
  
    <style>
    /* Radiant blue gradient background */
    body {
      background: linear-gradient(to right, #1e3c72, #2a5298); /* Dark blue to light blue */
      color: white; /* Ensure text is readable */
    }
</style>
</head>
<body>
  <div class="container mt-5">
    <h2>Add New Event</h2>

    <a href="index.php" class="btn btn-secondary mb-3">Back to Events</a>

    <form action="add_todo.php" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Event Name</label>
        <input type="text" name="title" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Event Description</label>
        <input type="text" name="description" class="form-control" required>
      </div>

      <div class="mb-3">
        
        <select name="event_status" class="form-control" required>
          <option value="Pending">Pending</option>
          <option value="Planning">Planning</option>
          <option value="Preparing">Preparing</option>
          <option value="Completed">Completed</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Add Event</button>
    </form>
  </div>
</body>
</html>
