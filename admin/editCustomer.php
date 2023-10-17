<?php

    session_start();
    
    if($_SESSION['isloggedin']=='no'){
        header('Location: index.php');
    }

    else if($_SESSION['user']!="admin"){
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
        <li><a href="admin.php">Admin Dashboard</a></li>
        <li><a href="createSeller.php">Create Seller</a></li>
        <li><a href="allSeller.php">All Sellers</a></li>
        <li class = 'active'><a href="allCustomers.php">All Customers</a></li>
        <li><a href="allProducts.php">All Products</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Edit your customer</h4>
        
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="well">
            <h2>Edit customer form</h2>
            <?php
                $id = $_REQUEST['id'];
                
                include '../connection.php';
                $query =  "SELECT * FROM `Customers` WHERE id = $id";

                $table = mysqli_query( $con , $query );
                $r = mysqli_fetch_array($table);

            ?>
            <form method="post">
              <div class="form-group">
                <label for="pname">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="pname" value=<?php echo $r['name']?> >
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=<?php echo $r['email']?>>
              </div>
              <div class="form-group">
                <label for="d.o.b">D.O.B:</label>
                <input type="d.o.b" class="form-control" id="d.o.b" placeholder="Enter D.O.B" name="d.o.b" value=<?php echo $r['d.o.b']?>>
              </div>
              <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="gender" class="form-control" id="gender" placeholder="Enter gender" name="gender" value=<?php echo $r['gender']?>>
              </div> 
              
              <button type="submit" name="add" value="add" class="btn btn-success">Update</button>
            </form>
            <?php
              
              if(isset($_POST['add'])){

                $pname = $_POST['pname'];
                
                $size = $_POST['email'];
                
                $weight = $_POST['d.o.b'];

                $price = $_POST['gender'];

    

                
                $query = "INSERT INTO Customers (name, email, d.o.b, gender) VALUES('$pname', $email, $d.o.b, $gender)";
                include '../connection.php';
                if(mysqli_query($con, $query)){
                  echo "Successfully created";
                }
                else{
                  echo "Something is wrong!!";
                }
              }

            ?>

          </div>
        </div>
        
      </div>
     
      
    </div>
  </div>
</div>

</body>
</html>
