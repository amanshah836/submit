<?php
  $username=$_POST['firstName'];
  $password=$_POST['lastName'];

  $username=stripcslashes($firstName);
  $password=stripcslashes($lastName);/*
  $username=mysqli_real_escape_string($username);
  $password=mysqli_real_escape_string($password);*/

  $con = mysqli_connect("localhost","root","","clients");
  #mysqli_select_db("submit");

 // Check connection
 if (mysqli_connect_errorno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

  $firstName=mysqli_real_escape_string($con,$firstName);
  $lastName=mysqli_real_escape_string($con,$lastName);

  $result=mysqli_query($con,"INSERT INTO 'clients'('firstName', 'lastName') VALUES('$firstName', '$lastName')");
      or die ("failed to query database ".mysqli_error($con));
  $row=mysqli_fetch_array($result);
  if($row['firstName']==$firstName && $row['lastName']==$lastName){
    echo"login success!!! welcome ".$row['firstName'];
  }
  else {
    echo"Failed";
  }
?>
