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
  <link rel="stylesheet" href="css/custom.css">

  <title>Loan/Investment Management System</title>
</head>

<body>
  <!-- Start Navigation Bar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">LMS</a>
    <span class="navbar-text">Learn To Invest</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation Bar -->

  <!-- Start Header Jumbotron-->
  <header class="jumbotron back-image" style="background-image: url(images/image.jpg);">
    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-white font-weight-bold">Loan Management System</h1>
      <p class="font-italic text-white">Maintain Your Investment</p>
      <a href="Login.php" class="btn btn-success mr-4">Login</a>
      <a href="#registration" class="btn btn-info mr-4">Sign Up</a>
    </div>
  </header> <!-- End Header Jumbotron -->

  <!-- Start Registration  -->
  <?php include('Registration.php') ?>
  <!-- End Registration  -->


  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>