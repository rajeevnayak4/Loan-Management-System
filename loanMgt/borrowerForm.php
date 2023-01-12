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

  <title>Borrower CRUD</title>
</head>

<body>
    <?php require_once 'borrowerProcess.php' ?>

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
        $result = $conn->query("SELECT * FROM data") or die($conn->error);
        //pre_r($result->fetch_assoc());
    ?>

<h2 class="text-center mb-5">LIST OF BORROWERS</h1>




<a href="logout.php" class="btn btn-info float-right" role="button" aria-pressed="true" style="margin-left: 25px;">Logout</a>

    <div class="row justify-conten-center">
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Borrower Name</th>
                    <th>Location</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
                while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['location'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td>
                    <a href="borrowerForm.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="borrowerProcess.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>

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




<h2 class="text-center mt-5">BORROWER FORM</h1>

<form action="borrowerProcess.php" class="mt-5" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Borrower Name">Borrower Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Your Name">
    </div>
    <div class="form-group col-md-6">
      <label for="Location">Location</label>
      <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter Your Location">
    </div>
  </div>






  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Email">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Your Email">
    </div>
    <div class="form-group col-md-6">
      <label for="Mobile">Mobile</label>
      <input type="number" name="mobile" class="form-control" value="<?php echo $mobile; ?>" placeholder="Enter Your Number">
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
    </div>

</body>