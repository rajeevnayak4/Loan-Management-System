<?php
include('dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
  if(isset($_REQUEST['rEmail'])){
    $rEmail = mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
    $rPassword = mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));
    $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email='".$rEmail."' AND r_password='".$rPassword."' limit 1";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
      
      $_SESSION['is_login'] = true;
      $_SESSION['rEmail'] = $rEmail;
      // Redirecting to dashboard page on Correct Email and Pass
      echo "<script> location.href='dashboard.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} else {
  echo "<script> location.href='dashboard.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/Loginpage.css">

  <title>Login</title>
</head>

<body>

<div class="row">
    <div class="col">
        <div class="img"></div>
    </div>
    <div class="col loginform">
        <div class="card">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="formlabel">
                    LOGIN PANEL
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
                    class="form-control" placeholder="Email" name="rEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
                    class="form-control" placeholder="Password" name="rPassword">
                </div>
                <button type="submit" class="btn btn-outline-success mt-3 shadow-sm font-weight-bold">Login</button>
                <?php if(isset($msg)) {echo $msg; } ?>
            </form>
            <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="index.php">Back
            to Home</a>
            </div>
        </div>
    </div>
</div>

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>