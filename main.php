


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<meta name="viewport" content="width=device-width">

	

	<title>curioussaiful login and signup</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<style type="text/css">
		
		
 
   #centered1{
   	 position: absolute;
   	 font-size: 10vw;
   	 top: 30%;
   	 left: 40%;
   	 transform: translate(-50%,-50%);
   }


   #centered2{
   	 position: absolute;
   	 font-size: 10vw;
   	 top: 50%;
   	 left: 40%;
   	 transform: translate(-50%,-50%);
   }

   #centered3{
   	 position: absolute;
   	 font-size: 10vw;
   	 top: 70%;
   	 left: 40%;
   	 transform: translate(-50%,-50%);
   }

#signup{
	width: 60%;
	border-radius: 30px;
}

#login{
	width: 60%;
	background-color: #fff;
	border:1px solid #1da1f2;
	color:#1da1f2;
	border-radius: 30px; 
}

#login:hover{
	width: 60%;
	background-color: #fff;
	border:2px solid #1da1f2;
	color:#1da1f2;
	border-radius: 30px; 
}

.well{
	background-color: #187FAB;
}

	</style>
</head>
<body>


						
		<div class="row">
			<div class="col-sm-12">
				<div class="well">
					<center>
						<h1>curioussaiful</h1>

						<p class="text-primary">Hi I am is here.</p>
					</center>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6" style="left:0.5%;">
					<img src="images/social.jpg" class="img-rounded" title="curioussaiful" width="650px" height="565px">

					<div id="centered1"class="centered">
						
						<h3 style="color:white;">

							<span class="glyphicon glyphicon-search">
								
							</span> &nbsp &nbsp

							<strong>
								Follow Your Interest
							</strong>
							
						</h3>
					</div>


					<div id="centered2"class="centered">
						
						<h3 style="color:white;">

							<span class="glyphicon glyphicon-search">
								
							</span> &nbsp &nbsp

							<strong>
								Here what people are talking about.
							</strong>
							
						</h3>
					</div>


					<div id="centered3"class="centered">
						
						<h3 style="color:white;">

							<span class="glyphicon glyphicon-search">
								
							</span> &nbsp &nbsp

							<strong>
								join the Conversation.
							</strong>
							
						</h3>
					</div>
				</div>
			</div>

			<div class="col-sm-6" style="left: 8%;">
				<img src="images/s2.png" class="image-rounded" title="curioussaiful" width="80px" height="80px">

				<h2>
					<strong>
						See what's happening in <br>the world right now 
					</strong>
				</h2><br><br>

				<h4>
					<strong>
						join saifulcurious Today.
					</strong>
				</h4>

				<form method="post" action="">
					<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>

<?php
if(isset($_POST['signup'])){
	/* it will take use into signup.php*/
	echo"<script>window.open('signup.php','_self')</script>";
}

?>
					<button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>

<?php
if(isset($_POST['login'])){
	/* it will take use into signin.php*/
	echo"<script>window.open('signin.php','_self')</script>";
}

?>
				
				</form>
			</div>
		</div>			
		





				
				
  













<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>