<?php

    session_start();

    //authentication
    if($_SESSION['isloggedin']=='no'){
        header('Location: index.php');
    }

    //authorisation
    else if($_SESSION['user']!="seller"){
        header('Location: unauthorised.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
    <h2><?php echo $_SESSION['name'];?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="seller.php">Seller Dashboard</a></li>
        <li><a href="addProduct.php">Add Product</a></li>
        <li class="active"><a href="myProducts.php">My Products</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>My products</h4>
        <p>This is my products page</p>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="well">
            <h2>Products table</h2>
                    
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product name</th>
                    <th>Size (cm)</th>
                    <th>Weight (g)</th>
                    <th>Buying price ($)</th>
                    <th>Action </th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                        include '../connection.php';
                        $id = $_SESSION['id'];
                        $query =  "SELECT * FROM `products` WHERE seller = $id";

                        $row = mysqli_query( $con , $query );
                        while($r = mysqli_fetch_array($row)){
                ?>
                            
                            <tr>

                   
                                <td><?php echo $r['id']?></td>
                                <td><?php echo $r['name']?></td>
                                <td><?php echo $r['size']?></td>
                                <td><?php echo $r['weight']?></td>
                                <td><?php echo $r['buying_price']?></td>
                                <td>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                                </td>


                            </tr>
                        
                <?php 
                    }

                ?>
                
                
                </tbody>
            </table>
            

          </div>
        </div>
        
      </div>
     
      
    </div>
  </div>
</div>

</body>
</html>
