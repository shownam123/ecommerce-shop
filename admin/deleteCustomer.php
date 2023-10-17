<?php

$id = $_REQUEST['id'];
echo $id;

$query = "DELETE FROM Customers where id = $id";
include '../connection.php';
    if(mysqli_query($con, $query)){
        header('Location: allCustomers.php');
        }
    else{
        echo "Something is wrong!!";
        }
              
?>