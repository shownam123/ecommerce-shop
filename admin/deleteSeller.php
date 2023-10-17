<?php

$id = $_REQUEST['id'];
echo $id;

$query = "DELETE FROM seller where id = $id";
include '../connection.php';
    if(mysqli_query($con, $query)){
        header('Location: allSeller.php');
        }
    else{
        echo "Something is wrong!!";
        }
              
?>

