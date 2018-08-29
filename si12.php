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


    if (strlen($_POST['username']) <5){
          die('
                    <div class="notice fail">
                <div class="notice-p">
                Usernames should be 5 characters or longer
                </div>
            </div><br />
            '); 
    }



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

  
	$result1 = mysqli_query($con, "SELECT count(`username`) FROM `users` WHERE `username` = '$username'");
	$row = mysqli_fetch_array($result1);

	if($row) {
		echo "The username exists. Enter a different username";
	}

	
	else{
		echo "You signed up successfully";
		$result2 = mysqli_query($con, "INSERT INTO `users`(`username`, `password`) VALUES ('".$username."','".$password."')")
}
		or die("failed to query database<br/>" .mysqli_error($con));
	}

?>
