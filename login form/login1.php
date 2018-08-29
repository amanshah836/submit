<?php
  $username=$_POST['user'];
  $password=$_POST['password'];

  $username=stripcslashes($username);
  $password=stripcslashes($password);/*
  $username=mysqli_real_escape_string($username);
  $password=mysqli_real_escape_string($password);*/

  $con = mysqli_connect("localhost","root","","submit");
  #mysqli_select_db("submit");

 // Check connection
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

  $username=mysqli_real_escape_string($con,$username);
  $password=mysqli_real_escape_string($con,$password);

  $result=mysqli_query($con,"select * from users where username='$username'and password='$password'")
      or die("failed to query database ".mysqli_error($con));
  $row=mysqli_fetch_array($result);
  if($row['username']==$username && $row['password']==$password){
    echo"login success!!! welcome ".$row['username'];
  }
  else {
    echo"failed to login";
  }
?>
