<!DOCTYPE html>

<?php



include("header.php");

if(!isset($_SESSION['user_email'])){
	header("location:index.php");
}
?>
<html>
<head>


	
	<?php

                $user=$_SESSION['user_email'];
                $get_user="select * from users where user_email='$user'";
                $run_user=mysqli_query($con,$get_user);
                $row=mysqli_fetch_array($run_user);

                
                $user_name=$row['user_name'];

	?>



	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<meta name="viewport" content="width=device-width">


	<title><?php echo"$user_name";
	?></title>

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

	</style>

</head>
<body>


<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
			<form action="home.php?id=<?php echo $user_id;?>" method="post" id="f" enctype="multipart/form-data">
				
              <textarea rows="4" cols="50" placeholder="what's in your mind?" class="form-control" id="content" name="content" ></textarea><br>
				<label class="btn btn-warning" id="upload_image_button">Select Image
					<input type="file" name="upload_image" size="30">
				</label>

				<button id="btn-post" class="btn btn-success" name="sub">Post</button>
			</form>

			<?php
			/*insert data for home.php*/
            insertPost();

			?>
		</center>
	</div>
</div>

		
<div class="row">
	<div class="col-sm-12">
		<center>
			<h2>
				<strong>
					News Feed
				</strong>
			</h2>
		</center>

		<?php  get_posts();?>
	</div>
</div>



</body>
</html>