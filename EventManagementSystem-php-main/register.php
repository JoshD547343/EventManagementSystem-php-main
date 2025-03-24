<?php
session_start();
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
      background: #1e3c72;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: white;
    }
    .card {
      width: 500px;
      padding: 40px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
      text-align: center;
    }
    .form-label {
      margin-bottom: 4px;
      font-size: 1rem;
      font-weight: bold;
      color: #333;
    }
    .form-control {
    font-size: 1rem; /* Adjust font size */
    padding: 2px; /* Reduce padding to make input thinner */
    height: 40px; /* Decrease height */
    width: 100%; /* Ensure it takes full width of parent */
    max-width: 350px; /* Adjust width */
    border-radius: 6px; /* Slightly rounded corners */
    border: 1px solid #999; /* Subtle border */
  }


    
    .btn-custom {
      background: #007bff;
      border: none;
      color: #fff;
      font-size: 1.2rem;
      font-weight: bold;
      padding: 12px;
      border-radius: 8px;
      transition: 0.3s;
      width: 100%;
    }
    .btn-custom:hover {
      background: #0056b3;
    }
    .login-title {
      font-size: 3rem;
      font-weight: bold;
    }
    .subtext {
      font-size: 1rem;
      margin-bottom: 20px;
    }
    .signup-link {
      font-size: 1rem;
      color: #007bff; 
      font-weight: bold;
      text-decoration: none;
    }
    .signup-link:hover {
      text-decoration: underline;
    }
    .mb-3 {
   margin-bottom: 10px; /* Reduce space between input fields */
  }
  .d-grid {
   margin-top: 15px; /* Adjust space between last input field and button */
  }
  .text-center.mt-3 {
   margin-top: 10px; /* Reduce space above "Already have an account?" */
  }
  .text-center small {
   color: #666; /* Change to any color you prefer */
   font-size: 0.9rem; /* Optional: Adjust font size */
}
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-3 mx-auto">
      <div class="text-center mb-1">
        <h1 class="login-title">🎭     Create Account    🎉</h1>
        <p class="subtext">Sign up to continue</p>
      </div>
      <div class="card">
        <?php if (!empty($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
        <form action="handler/register_handler.php" method="POST" novalidate>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-custom">
              Sign Up&nbsp;&nbsp;<i class="fa-solid fa-user-plus"></i>
            </button>
          </div>
        </form>
        <div class="text-center mt-3">
          <small>Already have an account? <a href="index.php" class="signup-link">Sign In</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
