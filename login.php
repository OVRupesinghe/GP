<?php
require 'config.php';
if(isset($_POST["submit"])){
  $unameemail = $_POST["unameemail"];
  $pword = $_POST["pword"];
  $result = mysqli_query($conn,"SELECT * FROM student WHERE Username = '$unameemail' OR email = '$unameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0){
    if($pword == $row["password"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["Reg_id"];
      header("Location:index.php");
    }
  }else{
    echo "<script> alert('User Not Registered'); </script>";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet2.css">
  </head>
  <body>

    <form class="" action="" method="post">
      <div class="container">
        <div class="box-0">
          <h3>Login</h3>
        </div>
        <div class="box-1">
          <label for="unameemail">Enter username or email </label>
        </div>
        <div class="box-2">
          <input type="text" name="unameemail" id="unameemail" required value=""><br>
        </div>
        <div class="box-3">
          <label for="pword">Enter Password: </label>
        </div>
        <div class="box-4">
          <input type="password" name="pword" id="pword" required value=""><br>
        </div>
        <div class="box-5">
            <button type="submit" name="submit">Login</button>
        </div>
        <div class="box-6">
          <a href="registration.php">
          <button>Register</button>
          </a>
          <br>
          <a href="Addingtask.php">Adding task</a>
    </form>
  </body>
</html>
