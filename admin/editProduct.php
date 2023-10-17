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
        <li><a href="allCustomers.php">All Customers</a></li>
        <li class = 'active'><a href="allProducts.php">All Products</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Edit your product</h4>
        
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="well">
            <h2>Edit product form</h2>
            <?php
                $id = $_REQUEST['id'];
                
                include '../connection.php';
                $query =  "SELECT * FROM `products` WHERE id = $id";

                $table = mysqli_query( $con , $query );
                $r = mysqli_fetch_array($table);

            ?>
            <form method="post">
              <div class="form-group">
                <label for="pname">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter product name" name="pname" value=<?php echo $r['name']?> >
              </div>
              <div class="form-group">
                <label for="size">Size:</label>
                <input type="size" class="form-control" id="size" placeholder="Enter size" name="size" value=<?php echo $r['size']?>>
              </div>
              <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="weight" class="form-control" id="pwd" placeholder="Enter weight" name="weight" value=<?php echo $r['weight']?>>
              </div>
              <div class="form-group">
                <label for="price">Buying price:</label>
                <input type="price" class="form-control" id="pwd" placeholder="Enter price" name="price" value=<?php echo $r['buying_price']?>>
              </div> 
              
              <button type="submit" name="add" value="add" class="btn btn-success">Update</button>
            </form>
            <?php
              
              if(isset($_POST['add'])){
                
                $pname = $_POST['pname'];
                
                $size = $_POST['size'];
                
                $weight = $_POST['weight'];

                $price = $_POST['price'];

    

                
                $query = "UPDATE products SET name = '$pname', size = $size, weight = $weight, buying_price = $price WHERE id = $id";
                include '../connection.php';
                if(mysqli_query($con, $query)){
                  echo '<script>';  
                  echo 'alert("Successfully updated")';  
                  echo '</script>';  
                  header('Location: allProducts.php');
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
