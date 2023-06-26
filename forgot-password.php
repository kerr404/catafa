<!DOCTYPE html>
<html>
<head>
  <title>CATAFA - Reset Password</title>
  <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/css/bootstrap.min.css">
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fontawesome/js/all.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/jquery/jquery-3.6.0.min.js"></script>
</head>
<style type="text/css">
      body {
        background-color: #e4e6ed;
    }
</style>

<body>
    <script type="text/javascript">
    //Removes get methods when page is reloaded
    if (performance.navigation.type === 1) {
    // The page was reloaded
    window.location.href = 'forgot-password.php';
  }
  </script>
   <!--Login Form-->

  <div id="login-form" class="container bg-white px-5 pt-3 pb-5 position-absolute top-50 start-50 translate-middle rounded-3 shadow-lg" style="width: 400px; height: 450px;">
  <form method="POST" action="actions/reset_password.php" onsubmit="return validateForm()">
      <div class="mt-1 row">
          <h3 class="text-center">Reset Password</h3>
      </div>
      <div class="mt-3 form-group">
          <label class="form-label m-0 mb-1">Current Password</label>
          <input class="form-control" type="password" name="current-pass" id="current-pass" placeholder="Current Password">
      </div>
      <div class="mt-2 form-group">
          <label class="form-label m-0 mb-1">New Password</label>
          <input class="form-control" type="password" name="new-pass" id="new-pass" placeholder="New Password">
      </div>
      <div class="mt-2 form-group">
          <label class="form-label m-0 mb-1">Confirm Password</label>
          <input class="form-control" type="password" name="repeat-pass" id="repeat-pass" placeholder="Repeat Password">
      </div>
      <span id="error-message" style="color: red">
        <?php if (isset($_GET['failed'])) {
            echo "Incorrect password";
        }?>
      </span>
      <div class="mt-3 form-group">
          <button class="btn btn-primary btn-block w-100" name="submit">Reset</button>
      </div>
  </form>

  <script>
  function validateForm() {
      var newPassword = document.getElementById("new-pass").value;
      var repeatPassword = document.getElementById("repeat-pass").value;
      if (newPassword !== repeatPassword) {
          document.getElementById("error-message").innerHTML = "Passwords do not match";
          return false;
      }
      if (newPassword.length < 8) {
          document.getElementById("error-message").innerHTML = "Password must be at least 8 characters long";
          return false;
      }
      return true;
  }
  </script>


  </div>
</body>
</html>