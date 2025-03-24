<?php
session_start();
include './database/database.php';
include './helpers/not_authenticated.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event Management</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: linear-gradient(to right, #1e3c72, #2a5298); /* Dark blue to light blue */
      color: white; /* Ensure text is readable */
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .card {
      width: 400px; /* Increased width */
      padding: 40px; /* More padding */
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }
    
    .form-label {
      font-size: 1.2rem; /* Bigger labels */
      font-weight: bold;
      color: rgb(16, 49, 121);
      margin-bottom: 8px;
    }

    .form-control {
   font-size: 1rem; /* Adjust font size */
   padding: 5px 55px; /* Reduce padding to make input thinner */
   height: 35px; /* Adjust height */
    border-radius: 6px; /* Slightly rounded corners */
    border: 1px solid #999; /* Subtle border */
}

.mb-3 {
  margin-bottom: 15px; /* Adds space between fields */
}


    .btn-custom {
      background: rgb(33, 149, 179);
      border: none;
      color: #fff;
      font-size: 1.2rem;
      font-weight: bold;
      padding: 14px;
      border-radius: 8px;
      transition: 0.3s;
      margin-top: 15px;
    }

    .btn-custom:hover {
      background: rgb(43, 95, 192);
    }

    .alert {
      font-size: 1rem;
      border-radius: 8px;
    }

    .text-highlight {
      color: rgb(13, 35, 230);
      font-weight: bold;
      font-size: 1.1rem;
    }

    /* Updated Event Management title */
    .login-title {
    font-size: 3rem; /* Bigger title */
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    margin-top: -50px; /* Moves title higher */
  }
    .spacer {
      margin-bottom: 20px;
    }
    .text-center small {
   color: #666; /* Change to any color you prefer */
   font-size: 0.9rem; /* Optional: Adjust font size */
}
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="text-center mb-4">
        <h1 class="login-title text-white">🎉 Event Management 🎭</h1>
        <p class="text-light">Login to continue</p>
      </div>
      <div class="card">
        <?php if (isset($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center spacer">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
        <form action="handler/login_handler.php" method="POST">
        <div class="mb-3">
  <label class="form-label">Username</label>
  <input type="text" class="form-control" name="username" required />
</div>
<div class="mb-3">
  <label class="form-label">Password</label>
  <input type="password" class="form-control" name="password" required />
</div>

          <div class="d-grid">
            <button type="submit" class="btn btn-custom">
              Login&nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
            </button>
          </div>
        </form>
        <div class="text-center mt-4">
          <small>Don't have an account? <a href="register.php" class="text-highlight text-decoration-none">Sign Up</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
