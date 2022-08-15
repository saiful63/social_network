<!DOCTYPE html>


<html>
<head>


	
	



	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<meta name="viewport" content="width=device-width">


	<title>Forgotten Password</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<style type="text/css">
		
		#upload_image_button{
	position: absolute;
	top: 51%;
	right: 13.5%;
	min-width: 100px;
	
	border-radius: 2px;
	transform: translate(-50%,-50%);
}

#content{
      width: 70%;
}

#btn-post{
	min-width: 25%;
	max-width: 25%;
}

#insert_post{
	background-color: #fff;
	border:2px solid #e6e6e6;
	padding: 40px 50px; 
}

#posts{
	border:5px solid #e6e6e6;
	padding: 40px 50px;
}

#posts-img{
	padding-top: 5px;
	padding-right: 10px;
	min-width: 102%;
	max-width: 50%;
}

#single_post{
	border:5px solid #e6e6e6;
	padding: 40px 50px;
}

	</style>

</head>
<body>


<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;"><strong>curioussaiful</strong></h1></center>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
         <div class="header">
         	<h3 style="text-align: center;"><strong>Forgot password</strong></h3><br>
         </div>

         <div class="l_pass">
         	<form action="" method="post">
         		<div class="input-group">
         		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
         		<input id="email" type="email" name="email" placeholder="Enter your Email" required>
         	</div><br>
         	<hr>

         	<pre class="text">Enter your Bestfriend name down below?</pre>

         	<div class="input-group">
         		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
         		<input id="msg" type="text" name="recovery_account" placeholder="Someone" class="form-control" required>
         	</div><br>

         	<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Back to signin?</a><br><br>

         	<center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
         	</form>
         </div>
		</div>
	</div>
</div>

</body>
</html>

<?php

session_start();

include("includes/connection.php");

if(isset($_POST['submit'])){
	$email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
	$recovery_account=htmlentities(mysqli_real_escape_string($con,$_POST['recovery_account']));

	$select_user="select * from users where user_email='$email' AND recovery_account='$recovery_account'";
	$query=mysqli_query($con,$select_user);
	$check_user=mysqli_num_rows($query);

	if($check_user==1){

		$_SESSION['user_email']=$email;
       /* after successfull login control is transfer to home.php*/
		echo"<script>window.open('change_password.php','_self')</script>";
	}else{
		echo"<script>alert('Your Email or Bestfriend name is incorrect')</script>";
	}

}

?>