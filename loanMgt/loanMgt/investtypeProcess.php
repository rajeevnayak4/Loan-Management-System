<?php

session_start();

include('dbConnection.php');

$id = 0;
$update = false;
$name = '';
$location = '';
$investment_type = '';
$interest_rate = '';
$amount = '';

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $investment_type = $_POST['investment_type'];
    $interest_rate = $_POST['interest_rate'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO investor_tb(name, location, investment_type, interest_rate, amount) VALUES ('$name','$location','$investment_type','$interest_rate','$amount')";
        if($conn->query($sql) == TRUE){
          echo "Data Inserted";
        } else {
            echo "Failed to Insert Data";
        }

    $_SESSION['message'] = "Record has been added.";
    $_SESSION['msg_type'] = "success.";

    header("location: investorForm.php");
}


if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM investor_tb WHERE id=$id") or die($conn->error());

    $_SESSION['message'] = "Record has been removed.";
    $_SESSION['msg_type'] = "danger.";

    header("location: investorForm.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM investor_tb WHERE id=$id") or die($conn->error);

    if($result->num_rows == 1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
        $investment_type = $row['investment_type'];
        $interest_rate = $row['interest_rate'];
        $amount = $row['amount'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $investment_type = $_POST['investment_type'];
    $interest_rate = $_POST['interest_rate'];
    $amount = $_POST['amount'];

    $result = $conn->query("UPDATE investor_tb SET name='$name', location='$location', investment_type='$investment_type', interest_rate='$interest_rate', amount='$amount' WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Record has been updated.";
    $_SESSION['msg_type'] = "warning.";

    header("location: investorForm.php");
}
?>