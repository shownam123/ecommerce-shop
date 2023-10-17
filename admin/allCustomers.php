<?php

    session_start();
    
    //authentication
    if($_SESSION['isloggedin']=='no'){
        header('Location: index.php');
    }

    //authorisation
    else if($_SESSION['user']!="admin"){
        header('Location: unauthorised.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
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
        <li><a href="admin.php">Admin Dashboard</a></li>
        <li><a href="createSeller.php">Create Seller</a></li>
        <li><a href="allSeller.php">All Sellers</a></li>
        <li class = "active"><a href="allCustomers.php">All Customers</a></li>
        <li><a href="allProducts.php">All Products</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-9">
      <div class="well">
        <h4>All customers</h4>
        <p>This is all customers form</p>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="well">
            <h2>Customer's table</h2>
                    
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>D.O.B</th>
                    <th>Gender</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                        include '../connection.php';
                        $query =  "SELECT * FROM `Customers`";

                        $row = mysqli_query( $con , $query );
                        while($r = mysqli_fetch_array($row)){
                ?>
                            
                            <tr>

                   
                                <td><?php echo $r['id']?></td>
                                <td><?php echo $r['name']?></td>
                                <td><?php echo $r['email']?></td>
                                <td><?php echo $r['d.o.b']?></td>
                                <td><?php echo $r['gender']?></td>
                                <td>
                                    <a href="editCustomer.php?id=<?php echo $r['id']?>"  type="button" class="btn btn-warning">Edit</a>
                                    
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $r['id']?>">Delete</button>
                                    <div class="modal fade" id="myModal<?php echo $r['id']?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Delete Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                <p>Do you really want to delete <b><?php echo $r['name']?> </b>? </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="deleteCustomer.php?id=<?php echo $r['id']?>" type="button" class="btn btn-success">Yes</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
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
