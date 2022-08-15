
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

/*post*/

#own_posts{
	width: 500px;
	height: 480px;
	border:5px solid grey;
	
}

#posts1{
	width: 500px;
	height: 520px;
	border:5px solid grey;
	
}

#posts2{
	width: 500px;
	height: 260px;
	border:5px solid grey;
}



	</style>


</head>
<body>

<br>
<div class="row">

	<?php

if(isset($_GET['u_id'])){
	$u_id=$_GET['u_id'];
}
if($u_id<0 ||$u_id=""){
	/*when $u_id is less than zero or zero then it will work*/
	echo "<script>window.open('home.php','_self')</script>";
}else{

	?>
	
	<div class="col-sm-12">
		<?php
if(isset($_GET['u_id'])){

	global $con;
	$user_id=$_GET['u_id'];
	$select="select * from users where user_id='$user_id'";
	$run=mysqli_query($con,$select);
	$row=mysqli_fetch_array($run);

	$name=$row['user_name'];
}

		?>


		<?php

if(isset($_GET['u_id'])){
/*showing information about user*/

	global $con;
	$user_id=$_GET['u_id'];
	$select="select * from users where user_id='$user_id'";
	$run=mysqli_query($con,$select);
	$row=mysqli_fetch_array($run);

	$id=$row['user_id'];
	$image=$row['user_image'];
	$name=$row['user_name'];
	$f_name=$row['f_name'];
	$l_name=$row['l_name'];
	$describe_user=$row['describe_user'];
	$country=$row['user_country'];
	$gender=$row['user_gender'];
	$register_date=$row['user_reg_date'];

	echo"

<div class='row'>
 <div class='col-sm-1'></div>

 <center>
 <div style='background-color:#e6e6e6;width:400px;height:300px; class='col-sm-3'>

 <h2>Information about</h2>

 <img class='rounded-circle' src='users/$image'width='150'height='150'>
 <br><br>

 <ul class='list-group'>

  <li class='list-group-item'title='Username'><strong>$f_name $l_name</strong></li>

  <li class='list-group-item'title='User Status'><strong style='color:grey;'>$describe_user</strong></li>

  <li class='list-group-item'title='Gender'><strong>$gender</strong></li>

    <li class='list-group-item'title='Country'><strong>$user_country</strong></li>

      <li class='list-group-item'title='User Registation Date'><strong>$register_date</strong></li>
   
 </ul>

	";
$user=$_SESSION['user_email'];
	$get_user="select * from users where user_email='$user'";
	$run_user=mysqli_query($con,$get_user);
	$row=mysqli_fetch_array($run_user);

	$userown_id=$row['user_id'];

/*when user click his own profile then he will go to edit_profile.php and other case he will go other user profile*/

	if($user_id==$userown_id){

		echo"<a href='edit_profile.php?u_id=$userown_id' class='btn btn-success'>Edit Profile</a><br><br><br>";
	}


echo"
</div>
</center>


";
		

}

?>


    <div class="col-sm-6" style="width:600px;height:600px; margin-left: 60px;">
	<h1><strong><?php echo"$f_name $l_name";?> Posts</strong></h1>
<?php
/*showing post of user*/

global $con;

if(isset($_GET['u_id'])){
	$u_id=$_GET['u_id'];
}

$get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
$run_posts=mysqli_query($con,$get_posts);

while($row_posts=mysqli_fetch_array($run_posts)){
	$post_id=$row_posts['post_id'];
	$user_id=$row_posts['user_id'];
	$content=$row_posts['post_content'];
	$upload_image=$row_posts['upload_image'];
	$post_date=$row_posts['post_date'];

	$user="select * from users where user_id='$user_id' AND post='yes'";
	$run_user=mysqli_query($con,$user);
	$row_user=mysqli_fetch_array($run_user);

	$user_name=$row_user['user_name'];
	$f_name=$row_user['f_name'];
	$l_name=$row_user['l_name'];
	$user_image=$row_user['user_image'];


	if($content=="No" && strlen($upload_image)>=1){

		echo"

<div id='own_posts'>

 <div class='row'>
   <div class='col-sm-2'>
    <p><img src='users/$user_image' class='rounded-circle' width='100px' height='100px'></p>
   </div>

   <div class='col-sm-6'>
     <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

     <h4><small style='color:black;'>Updated a post on<strong>$post_date</strong></small></h4>
   </div>
<div class='col-sm-2'></div>

 </div>

<div class='row'>
   <div class='col-sm-12'>
<img id='posts-img' src='imagepost/$upload_image'style='height:350px'>
   </div>
   </div><br>


<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a>

<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
<br>
</div><br><br><br><br><br>

		";
	}

	else if(strlen($content)>=1 && strlen($upload_image) >= 1){
			echo"
			
				
      <div class='col-sm-1'>

      </div>

    
				<div id='posts1' style='' class='col-sm-9'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img id='im_1'src='users/$user_image' class='rounded-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-10'>
							<h3 id='err1'><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 id='err2' style=''><small style='color:blue;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						
					</div>


					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a>

					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
				</div><br><br>





				
			

		";
			
		}



else{
			echo"
			
				
      <div class='col-sm-1'>

      </div>

    
				<div id='posts2' style='' class='col-sm-9'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img id='im_1'src='users/$user_image' class='rounded-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-10'>
							<h3 id='err1'><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 id='err2' style=''><small style='color:blue;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						
					</div>


					<div class='row'>

					
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
							
						</div>
                 

					
				</div><br>

					
<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>


</div><br><br>


                

				
			

		";
	}

}


?>
</div>

</div>
	
	</div>

	
</div>

	<?php
}

?>	

</body>
</html>