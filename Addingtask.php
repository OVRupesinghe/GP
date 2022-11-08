<?php
require 'config.php';
if(isset($_POST["submit"])){
  $tschedule = 1;
  $tname = $_POST["tname"];
  $tdate= $_POST["tdate"];
  $ttime = $_POST["ttime"];
  $tcolor = $_POST["tcolor"];
  $is_reminder = $_POST["reminder"];
  $duplicate = mysqli_query($conn, "SELECT * FROM shedule_task WHERE task_description = '$tname' AND task_date ='$tdate' AND task_time ='$ttime'");
  if(mysqli_num_rows($duplicate)>0){
    echo "<script> alert ('task with same name,date,time already exists');</script>";
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
    <title>Adding task</title>
    <!-- <link rel="stylesheet" href="stylesheet.css"> -->
  </head>
  <body>
    <h2>Add task</h2>

    <form class="" action="" method="post">
      <div class="container">
        <label for="tname">Name of the task</label>
        <input type="text" name="tname" id="tname" required value=""><br>

        <label for="tdate">Due date</label>
        <input type="date" name="tdate" id="tdate" required value=""><br>

        <label for="ttime">Due time</label>
        <input type="time" id="ttime" name="ttime" required><br>

        <label>Task color</label>
        <input type="radio" id="1" name="tcolor" value="#FEAEAE">
        <input type="radio" id="2" name="tcolor" value="#B8FEC7">
        <input type="radio" id="3" name="tcolor" value="#A3A2EA">
        <input type="radio" id="4" name="tcolor" value="#E28FEF">
<br>
        <button type="submit" name="submit1">Add task</button><br>
        <label for="reminder"> add a reminder</label>
        <input type="checkbox" id="reminder" name="reminder" value="reminder">
        <h3>Add reminder</h3>

        <label for="rdate">Due date </label>
        <input type="date" name="rdate" id="rdate" required value=""><br>

        <label for="rtime">Due time</label>
        <input type="time" id="rtime" name="rtime" required><br>

        <button type="submit" name="submit">Add reminder</button>
      </div>
    </form>
    <div class="container">
      <a href="index.php">
      <button>go back</button>
      </a>
    </div>
  </body>
</html>
