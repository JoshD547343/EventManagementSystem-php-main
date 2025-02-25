<?php
include "../database/database.php";

try {

  $id = $_GET['id'];
  $stmt = $conn->prepare("DELETE FROM events WHERE id =?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
  } else {
    echo "operation failed: ";

  }
} catch (\Exception $e) {
     echo "Error: " . $e;
}

?>