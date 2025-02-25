<?php
include "../database/database.php";

try {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $event_status = $_POST['event_status'];
      
        $stmt = $conn->prepare("UPDATE events SET title=?, description=? , event_status=?  WHERE id =?");
        $stmt->bind_param("sssi", $title, $description, $event_status, $id);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Operation failed: " .$stmt->error;
        }
    }

} catch (\Exception $e) {
    echo "Error: " .$e->getMessage();
}

?>