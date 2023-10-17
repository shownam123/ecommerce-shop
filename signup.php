<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Signup Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form method="post">
<div class="form-field">
    <input name="fname" type="first name" placeholder="First Name" required/>
  </div>

  <div class="form-field">
    <input name="dob" type="date" placeholder="Date of Birth" required/>
  </div>

  <div class="form-field">
    <select name="gender" id="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="others">Others</option>
  </select>
  </div>

<div class="form-field">
    <input name="email" type="email" placeholder="Email / Username" required/>
  </div>
  
  <div class="form-field">
    <input name="p1" type="password" placeholder="New Password" required/>
  </div>
  
  <div class="form-field">
    <button name= "signup" class="btn" type="submit" value="signup" >Signup</button>
  </div>
</form>
<?php 
    if(isset($_POST['signup'])){

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $p1 = $_POST['p1'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
       
        echo $fname;
        echo '<br>';

        echo $email;
        echo '<br>';

        echo $p1;
        echo '<br>';

        echo $dob;
        echo '<br>';

        echo $gender;
        echo '<br>';

        

        $query = "INSERT INTO customers(name, email, password, `d.o.b`, gender ) VALUES('$fname', '$email', '$p1' ,'$dob', '$gender')";

        include 'connection.php';

        if(mysqli_query( $con , $query )){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Successfully inserted")';  
            echo '</script>';  
        }

        else{
            // echo '<script type ="text/JavaScript">';  
            // echo 'alert("something is wrong!!")';  
            // echo '</script>'; 
            echo 'error';
        }

    }

    
?>
<!-- partial -->
  
</body>
</html>

