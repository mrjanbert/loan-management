<?php session_start();?> 
<?php
  if (isset($_SESSION['user_id'])) {
    header('location: application/pages/home.php?page=dashboard&accountNumber='.$_SESSION['accountNumber']);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - NMSC Loan Management</title>
  <link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">
  <?php include_once('application/includes/links-header.php');?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- Toast Notification -->
    <?php
      if (isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
        echo "<span>$status</span>";
      }
    ?> <!-- end of toast -->

    <div class="d-flex justify-content-center">
      <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-center">
          <h3><b>Login</b></h3>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" name="email" placeholder="email" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control remember" id="password" name="password" placeholder="password" required>
            </div>
            <div class="input-group align-items-center">
              <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show password
            </div>
            <div class="form-group">
              <button type="submit" name="login_btn" value="submit" class="btn btn-primary float-right">Login Now</button>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-center">
            <p>Don't have an account? <a href="register.php">Register</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
    
    <!-- unset toast notification to avoid popup every load -->
    <?php unset($_SESSION["status"]); ?>

    <?php include_once('application/includes/links-footer.php'); ?>
</body>

</html>