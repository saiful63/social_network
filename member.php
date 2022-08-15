<!DOCTYPE html>

<?php



include("header.php");

if(!isset($_SESSION['user_email'])){
	header("location:index.php");
}
?>
<html>
<head>


	
	



	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<meta name="viewport" content="width=device-width">


	<title>Find People</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<link rel="stylesheet" type="text/css" href="style/home_style2.css">

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


#find_people{

border:5px solid #e6e6e6;
padding: 40px 50px;
}

form.search_form input[type=text]{
	padding: 10px;
	font-size: 17px;
	border-radius: 4px;
	border:1px solid grey;
	float: left;
	width: 80%;
	background-color: #f1f1f1; 
}


form.search_form button{
	float: left;
	width: 20%;
	padding: 10px;
	font-size: 17px;
	border:1px solid grey;
	border-left: none;
	cursor: pointer; 
}

form.search_form button:hover{

	background:#0b7dda; 
}

form.search_form::after{
	content: "";
	clear: both;
	display: table;
}



	</style>


</head>
<body>


<div class="row">

	<div class="col-sm-12">
		<center><h2>Find New People</h2></center><br><br>

		<div class="row">
			<div class="col-sm-4">
				
			</div>

			<div class="col-sm-4">
				<form class="search_form" action="">
					<input type="text" placeholder="Search Friend" name="search_user">
					<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
				</form>
			</div>

			<div class="col-sm-4"></div>
		</div><br><br>


		<?php

        search_user();

		?>
	</div>
	
</div>

		

</body>
</html>