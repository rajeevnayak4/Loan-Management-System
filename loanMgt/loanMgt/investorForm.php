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

  <title>Investor CRUD</title>
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

<h2 class="text-center mb-5">LIST OF INVESTORS</h1>




<a href="logout.php" class="btn btn-info float-right" role="button" aria-pressed="true" style="margin-left: 25px;">Logout</a>

    <div class="row justify-conten-center">
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Investor Name</th>
                    <th>Location</th>
                    <th>Type of Investment</th>
                    <th>Interest Rate</th>
                    <th>Amount</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
                while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <?php
                echo '<td><a href="investtypeForm.php">'. $row['name'] .'</a></td>';
                ?>
            
                <!-- <td>
                <?php //echo $row['name'] ?>
                </td>
                -->

                <td><?php echo $row['location'] ?></td>
                <td><?php echo $row['investment_type'] ?></td>
                <td><?php echo $row['interest_rate'] ?></td>
                <td><?php echo $row['amount'] ?></td>

                <td>
                    <a href="investorForm.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="investorProcess.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>

                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <?php
        function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>

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
        
        <a href="Login.php" class="btn btn-info float-right" role="button" aria-pressed="true" style="margin-left: 25px;">Back To Dashboard</a>

    </div>
</form>

    </div>

</body>