<?php

$id = $_REQUEST['id'];
echo $id;

$query = "DELETE FROM products where id = $id";
include '../connection.php';
    if(mysqli_query($con, $query)){
        header('Location: allProducts.php');
        }
    else{
        echo "Something is wrong!!";
        }
              
?>

