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

	if(!empty($_POST)) {
// check length of $_POST['username']

    if (strlen($_POST['username']) <5){
          die('
                    <div class="notice fail">
                <div class="notice-p">
                Usernames should be 5 characters or longer
                </div>
            </div><br />
            '); 
    }

  // check length of $_POST['password']

    if (strlen($_POST['password']) <5){
          die('
                    <div class="notice fail">
                <div class="notice-p">
                Passwords should be 5 characters or longer
                </div>
            </div><br />
            '); 
    }
}

  
    function result1($username){
    $result1 =($con, "SELECT username from `users` WHERE `username` = '$username'") or die("failed to query database<br/>".mysqli_error($con));
    mysqli_query($result1);
       if($result1 > 0){
          echo "true";
       }else{
          echo "false";
       }
    }

    if($result1($username)){
       echo "username is already exist.";
    }else{
       //Insert the user info into db
    }

	
    {
       $result2 = mysqli_query($con, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')")
	or die("failed to query database<br/>" .mysqli_error($con));
    }
	else
{
       echo "The user is already signed" ;
}
?>
