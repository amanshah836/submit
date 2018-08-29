<?php
  $username=$_POST['username'];
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

  $result1 = mysqli_query($con,"select * from users where username='$username'and password='$password'")
      or die("failed to query database<br/>".mysqli_error($con));
	$count = mysqli_num_rows($result1);
	if($count == 0)
    {
       $result2 = mysqli_query($con, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')")
	or die("failed to query database<br/>" .mysqli_error($con));
    }
	else
{
       echo "The user is already signed" ;
}
?>
