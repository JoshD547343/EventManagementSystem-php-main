<?php
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_status = $_POST['event_status'];

    if (empty($title) || empty($description) || empty($event_status)) {
      echo("Error: All fields are required.");
  }

    $sql = "INSERT INTO events (title, description, event_status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

if ($stmt) {   
       $stmt->bind_param("sss", $title, $description, $event_status);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../index.php");
        exit;
    } else {
        echo ("operation failed" .$stmt->error);
    }

   } else {
        echo ("Error: " .$conn->error);
   }
}

?>