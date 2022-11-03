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
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <h2>Login</h2>
    <form class="" action="" method="post">
      <div class="container">
        <label for="unameemail">Enter username or email </label>
        <input type="text" name="unameemail" id="unameemail" required value=""><br>

        <label for="pword">Enter Password: </label>
        <input type="password" name="pword" id="pword" required value=""><br>
        <button type="submit" name="submit">Login</button>

      </div>
    </form>
    <div class="container">
      <a href="registration.php">
      <button>Register</button>
      </a>
    </div>

<br>

  </body>
</html>
