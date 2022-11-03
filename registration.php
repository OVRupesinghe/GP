<?php
require 'config.php';
if(isset($_POST["submit"])){
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $nic = $_POST["nice"];
  $uname = $_POST["uname"];
  $pword = $_POST["pword"];
  $cpword = $_POST["cpword"];
  $dob = $_POST["dob"];
  $age = $_POST["age"];
  $uni = $_POST["uni"];
  $location = $_POST["location"];
  $duplicate = mysqli_query($conn, "SELECT * FROM student WHERE Username = '$uname' OR email ='$email'");
  if(mysqli_num_rows($duplicate)>0){
    echo "<script> alert ('username or email is already in use');</script>";
  }else{
    if($pword == $cpword){
      $query = "INSERT INTO student VALUES('','$fname','$lname','$contact','$email','$address','$nic','$uname','$pword','$dob','$age','$uni','$location')";
      mysqli_query($conn,$query);
      echo "<script> alert ('Registration sucessful')</script>";
    }else{
      echo "<script> alert ('passwords do not match')</script>";
    }
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <h2>Registration</h2>

    <form class="" action="" method="post">
      <div class="container">
        <label for="fname">FirstName : </label>
        <input type="text" name="fname" id="fname" required value=""><br>

        <label for="lname">LastName : </label>
        <input type="text" name="lname" id="lname" required value=""><br>

        <label for="contact">Contact No. : </label>
        <input type="text" name="contact" id="contact" required value=""><br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required value=""><br>

        <label for="address">Address : </label>
        <input type="text" name="address" id="address" required value=""><br>

        <label for="nic">NIC: </label>
        <input type="text" name="nic" id="nic" required value=""><br>

        <label for="uname">User Name: </label>
        <input type="text" name="uname" id="uname" required value=""><br>

        <label for="pword">Password: </label>
        <input type="password" name="pword" id="pword" required value=""><br>

        <label for="cpword">Confirm Password: </label>
        <input type="password" name="cpword" id="cpword" required value=""><br>

        <label for="dob">Date of birth: </label>
        <input type="date" name="dob" id="dob" required value=""><br>

        <label for="age">Age: </label>
        <input type="text" name="age" id="age" required value=""><br>

        <label for="uni">University: </label>
        <input type="text" name="uni" id="uni" required value=""><br>

        <label for="location">University Location: </label>
        <input type="text" name="location" id="location" required value=""><br>

        <button type="submit" name="submit">Register</button>
      </div>
    </form>
    <div class="container">
      <a href="login.php">
      <button>Login</button>
      </a>
    </div>
  </body>
</html>
