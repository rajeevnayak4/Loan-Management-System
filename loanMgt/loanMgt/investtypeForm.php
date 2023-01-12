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

  <title>Investor Type CRUD</title>
</head>

<body>
    <?php require_once 'investorProcess.php' ?>

    <?php
        if(isset($_SESSION['message'])): 
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>

    <?php endif ?>

    <div class="container">
    <?php
        include('dbConnection.php');
        $result = $conn->query("SELECT * FROM investor_tb") or die($conn->error);
        //pre_r($result->fetch_assoc());
    ?>



<a href="logout.php" class="btn btn-info float-right" role="button" aria-pressed="true" style="margin-left: 25px;">Logout</a>


<h2 class="text-center mt-5">INVESTOR FORM</h1>



<form action="investorProcess.php" class="mt-5" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Investor Name">Investor Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Your Name">
    </div>
    <div class="form-group col-md-6">
      <label for="Location">Location</label>
      <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter Your Location">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Type of Investment Name">Type of Investment</label>
      <input type="text" name="investment_type" class="form-control" value="<?php echo $investment_type; ?>" placeholder="Enter Your Type of Investment">
    </div>
    <div class="form-group col-md-4">
      <label for="Interest Rate">Interest Rate</label>
      <input type="number" name="interest_rate" class="form-control" value="<?php echo $interest_rate; ?>" placeholder="Enter Your Interest Rate">
    </div>
    <div class="form-group col-md-4">
      <label for="Amount">Amount</label>
      <input type="number" name="amount" class="form-control" value="<?php echo $amount; ?>" placeholder="Enter Amount">
    </div>
  </div>

    <div class="form-group">
        <?php
            if ($update == true): 
        ?>
        <button type="submit" class="btn btn-success" name="update">Update</button>
        <?php else: ?>
        <button type="submit" class="btn btn-success" name="save">Add</button>
        <?php endif; ?>
        
        <a href="investorForm.php" class="btn btn-info float-right" role="button" aria-pressed="true" style="margin-left: 25px;">Back To Dashboard</a>

    </div>
</form>

    </div>

</body>