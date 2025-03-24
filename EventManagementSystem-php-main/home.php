<?php
include './database/database.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <script src="statics/js/bootstrap.js"></script>

  <style>
    /* Radiant blue gradient background */
    body {
      background: linear-gradient(to right, #1e3c72, #2a5298); /* Dark blue to light blue */
      color: black; /* Ensure text is readable */
    }
    
.mb-3 {
  margin-bottom: 15px; /* Adds space between fields */
}

    .event-card {
      transition: transform 0.3s ease-in-out;
      background: white; /* Keep event card background white */
      color: black; /* Ensure text inside cards is readable */
      padding: 15px;
      border-radius: 8px;
    }

    .title {
      font-size: 48px;
      font-weight: bold;
      color: #fff; /* White text for title */
    }

    .description {
      font-size: 16px;
      color: #ddd; /* Light grey for better contrast */
    }

    .no-list-text {
      font-size: 20px;
      color: #ccc;
    }

    .btn-custom {
      background-color: rgb(83, 214, 71);
      color: green;
      border-radius: 50px;
    }

    .logout-link {
  color:rgb(79, 73, 83); /* Purple color */
  text-decoration: none; /* No underline */
  font-size: 18px; /* Make it readable */
  font-weight: bold;
}

.logout-link i {
  margin-left: 5px; /* Space between text and icon */
}

.logout-link:hover {
  text-decoration: underline; /* Underline on hover */
  color:rgb(173, 13, 13); /* Lighter purple */
}
.delete-btn {
  background-color: #505050 !important; /* Dark gray */
  color: white !important; /* White text for readability */
  border: none;
}

.delete-btn:hover {
  background-color: #343a40 !important; /* Even darker gray on hover */
}


  </style>
  
</head>
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="text-center mb-4">
          <h1 class="display-4 fw-bold text-light"> 🎮 Event List 🎶</h1>
          <p class="lead text-light">Discover and share amazing events with others!</p>
        </div>

        <div class="mb-4 text-center">
          <a href="../EventManagementSystem-php-main/add_todo.php" class="btn btn-lg btn-info">Add New Event</a>
        </div>

        <?php
          $res = $conn->query("SELECT * FROM events");
        ?>

        <?php if($res->num_rows > 0): ?>
            <?php while($row = $res->fetch_assoc()): ?>
            <div class="row border rounded p-3 my-3 event-card">
                <div>
                  <h5 class="fw-bold"><?= $row['title']; ?></h5>
                  <p class="text-secondary"><?= $row['description']; ?></p>
                  <p><strong>Status:</strong> <?= $row['event_status']; ?></p>
                  
                  <div class="row my-1">
                      <a href="../EventManagementSystem-php-main/update_todo.php?id=<?=$row['id'];?>" class="btn btn-sm btn-info">Edit</a>
                  </div>
                  <div class="row my-1">
                  <a href="handler/delete_todo_handler.php?id=<?=$row['id'];?>" class="btn btn-sm delete-btn">Delete</a>
                  </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="row border rounded p-3 my-3 text-center">
                <div class="col mt-3">
                    <p class="text-light">🎉 No events yet! Time to add some!</p>
                </div>
            </div>
        <?php endif; ?>
      </div>
    </div>
  <div class="text-center mt-4">
  <a href="./handler/logout_handler.php" class="logout-link">
    Logout <i class="fa-solid fa-right-from-bracket"></i>
  </a>
</div>



</body>
</html>
