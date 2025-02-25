<?php
include './database/database.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $events = $result->fetch_assoc();

  if (!$events) {
      echo "Event not found!";
      exit;
  }
} else {
  echo "Invalid request!";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $event_status = $_POST['event_status'];

  $stmt = $conn->prepare("UPDATE events SET title=?, description=?, event_status=? WHERE id=?");
  $stmt->bind_param("sssi", $title, $description, $event_status, $id);

  if ($stmt->execute()) {
      echo "<script>alert('Events updated successfully!'); window.location.href='index.php';</script>";
  } else {
      echo "Error updating event: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Events</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="../statics/js/bootstrap.js"></script>
</head>
<body class="container mt-5">
    <h2>Update Events</h2>

    <a href="index.php" class="btn btn-secondary mb-3">Back to Event</a>

    <form action="update_todo.php?id=<?= $events['id']; ?>" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Event Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($events['title']); ?>" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" value="<?php echo htmlspecialchars($events['description']); ?>" required>
      </div>

      <div class="mb-3">
        <label>Status: </label>
        <select name="event_status" class="form-control">
            <option value="Pending" <?php if ($events['event_status'] == "Pending") echo "selected"; ?>>Pending</option>
            <option value="Preparing" <?php if ($events['event_status'] == "Preparing") echo "selected"; ?>>Preparing</option>
            <option value="Completed" <?php if ($events['event_status'] == "Completed") echo "selected"; ?>>Completed</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Update Events</button>
    </form> 
</body>
</html>

