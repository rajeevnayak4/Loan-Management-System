<?php

session_start();

include('dbConnection.php');

$id = 0;
$update = false;
$name = '';
$location = '';
$email = '';
$mobile = '';

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO data(name, location, email, mobile) VALUES ('$name','$location','$email','$mobile')";
        if($conn->query($sql) == TRUE){
          echo "Data Inserted";
        } else {
            echo "Failed to Insert Data";
        }

    $_SESSION['message'] = "Record has been added.";
    $_SESSION['msg_type'] = "success.";

    header("location: borrowerForm.php");
}


if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM data WHERE id=$id") or die($conn->error());

    $_SESSION['message'] = "Record has been removed.";
    $_SESSION['msg_type'] = "danger.";

    header("location: borrowerForm.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error);

    if($result->num_rows == 1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $result = $conn->query("UPDATE data SET name='$name', location='$location', email='$email', mobile='$mobile' WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Record has been updated.";
    $_SESSION['msg_type'] = "warning.";

    header("location: borrowerForm.php");
}
?>