<?php
  session_start();
  $_SESSION['isloggedin'] = "no";
  $_SESSION['user'] = "none";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form  method="post">
  <div class="form-field">
    <input name="email" type="email" placeholder="Email / Username" required/>
  </div>
  
  <div class="form-field">
    <input name="password" type="password" placeholder="Password" required/>                         
  </div>
  
  <div class="form-field">
    <button name="login" value="login" class="btn" type="submit">Log in</button>
  </div>
</form>
<?php
    if(isset($_POST['login'])){
       
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo $email;
        echo "<br>";

        echo $password;
        echo "<br>";

        include 'connection.php';
        $query=  "SELECT * FROM `admins` WHERE email = '$email' and password = '$password'";
        
        $row = mysqli_query( $con , $query );
        $r = mysqli_fetch_array($row);
        if($r){
            $_SESSION['isloggedin'] = "yes";
            $_SESSION['user'] = "admin";
            $_SESSION['id'] = $r['id'];
            $_SESSION['name'] = $r['name'];
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Successfully logged in")';  
            echo '</script>';  
            header('Location: admin/admin.php');
        }
        else{
          
              $query=  "SELECT * FROM `Customers` WHERE email = '$email' and password = '$password'";
      
              $row = mysqli_query( $con , $query );
              $r = mysqli_fetch_array($row);
              if($r){
                  $_SESSION['isloggedin'] = "yes";
                  $_SESSION['user'] = "customer";
                  $_SESSION['id'] = $r['id'];
                  $_SESSION['name'] = $r['name'];
                  echo '<script type ="text/JavaScript">';  
                  echo 'alert("Successfully logged in")';  
                  echo '</script>';  
                  header('Location: customer/customer.php');
              }
              else{
                  $query=  "SELECT * FROM `seller` WHERE email = '$email' and password = '$password'";
        
                  $row = mysqli_query( $con , $query );
                  $r = mysqli_fetch_array($row);
                  if($r){
                      $_SESSION['isloggedin'] = "yes";
                      $_SESSION['user'] = "seller";
                      $_SESSION['id'] = $r['id'];
                      $_SESSION['name'] = $r['name'];
                      echo '<script type ="text/JavaScript">';  
                      echo 'alert("Successfully logged in")';  
                      echo '</script>';  
                      header('Location: seller/seller.php');
                  }
                  else{
                      echo '<script type ="text/JavaScript">';  
                        echo 'alert("Something is wrong")';  
                        echo '</script>';
                  }

          
              }
  
          

        }
    }
?>

<!-- partial -->
  
</body>
</html>
