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
	
	#change{
			padding: 0px;

		}

	#cover-img{
		height: 400px;
		width: 100%;
	}

	#profile-img{
		position: absolute;
		top: 165px;
		left: 5px;
	}

	#update_profile{
		position: relative;
		top: -40px;
		cursor: pointer;
		left: 85px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%,-50%);
	}

	#button_profile{
		position: absolute;
		top: 75%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%,-50%);
		width: 100px!important;
		height: 40px!important;
	}

	#p_img{
		border-radius: 100%;
		width:160px; 
		height:165px;
		
		margin-left: 0px;}

#own_posts{
	border:5px solid #e6e6e6;
	padding: 40px 50px;
}

#post_img{
	height: 300px;
	width: 100px;
}

#im_1{
	border-radius: 100%;
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

/*profile image*/
#profile-img{
	width: 100%!important;
}
</style>


</head>



<body>



<div class="row">
	<div class="col-sm-2">
		
	</div>

	<div class="col-sm-6">
		<?php
echo"

<div>
<div>
<img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'>

<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
  <ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
   <li class='dropdown'>
    



<nav id='change'class='navbar navbar-expand-lg navbar-light bg-light'>
  
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
<div class='collapse navbar-collapse' id='navbarNavDropdown'>
    <ul class='navbar-nav'>
<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#'' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Change Cover
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>



<center>
<p>   Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>

<label class='btn btn-info'>
Select Cover
<input type='file' name='u_cover' size='60'>
</label><br><br>

<button name='submit' class='btn btn-info'>Update cover</button>
      </center>



          
        </div>
      </li>
  </ul>

</div>
</nav>


<div id='profile-img'>

<img id='p_img' src='users/$user_image' alt='profile' class='img-circle' width='180px' height='185px'>
  <form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>
     <label id='update_profile'>
     Select Profile
    <input type='file' name='u_image' size='60'>
    </label><br><br>

    <button id='button_profile' name='update' class='btn-info'>Update</button>
  </form>
</div><br>





";

		?>


		<?php
    

    /*cover update*/
if(isset($_POST['submit'])){

	$u_cover=$_FILES['u_cover']['name'];

	$image_tmp=$_FILES['u_cover']['tmp_name'];

	$random_number=rand(1,100);
	if($u_cover==''){
		echo"<script>alert('Please Select Cover Image')</script>";

		echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
		exit();
	}else{
		move_uploaded_file($image_tmp,"cover/$u_cover.$random_number");
		$update="update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";

		$run=mysqli_query($con,$update);

		if($run){

			echo"<script>alert('Your Cover Updated')</script>";

		echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
		}
	}
	

}
		?>
	</div>



	<?php

/*update profile*/
if(isset($_POST['update'])){

	$u_image=$_FILES['u_image']['name'];

	$image_tmp=$_FILES['u_image']['tmp_name'];

	$random_number=rand(1,100);
	if($u_image==''){
		echo"<script>alert('Please Select Profile Image on clicking on your profile image')</script>";

		echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
		exit();
	}else{
		move_uploaded_file($image_tmp,"users/$u_image.$random_number");
		$update="update users set user_image='$u_image.$random_number' where user_id='$user_id'";

		$run=mysqli_query($con,$update);

		if($run){

			echo"<script>alert('Your Profile Updated')</script>";

		echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
		}
	}
	

}
		?>

		
<div class="row">
	

	<div class="col-sm-4" style="background-color: #e6e6e6;text-align: center;left: 0.8%;border-radius: 5px; max-height: 600px;">
		<?php

echo"

<center><h2><strong>About</strong></h2></center>
<center><h4><strong>$first_name $last_name</strong></h4></center>

<p><strong><i style='color:gray;'>$describe_user</i></strong></p><br>

<p><strong>Relationship Status:</strong>$Relationship_status</p><br>

<p><strong>Lives In:</strong>$user_country</p><br>

<p><strong>Member Science:</strong>$register_date</p><br>

<p><strong>Gender:</strong>$user_gender</p><br>

<p><strong>Date of Birth:</strong>$user_birthday</p><br>


";
		?>


	</div>



	
	<!--display user post-->
	<?php

global $con;

if(isset($_GET['u_id'])){
	 $u_id=$_GET['u_id'];
}

$get_post="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

$run_post=mysqli_query($con,$get_post);
$i=0;

while($row_posts=mysqli_fetch_array($run_posts)){
     
     $post_id=$row_posts['post_id'];
     $user_id=$row_posts['user_id'];
     $content=$row_posts['post_content'];
     $upload_image=$row_posts['upload_image'];
     $post_date=$row_posts['post_date'];
     

     $user="select * from users where user_id='$u_id' AND post='yes'";

     $run_user=mysqli_query($con,$user);

     $row_user=mysqli_fetch_array($run_user);

    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

     //now we will display the posts

     if($content=="No" && strlen($upload_image) >= 1){
		 if($i==1){
			echo"
			
			<div class='col-sm-4'>
			</div>
			";
		 }
			echo"
			
	

    
				<div id='posts'class='col-sm-8'>
					
						
						<p><img id='im_1'src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						
						
							<h3 id='err1'><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 id='err2' style=''><small style='color:blue;'>Updated a post on <strong>$post_date</strong></small></h4>
					
						
					


					
					
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						
					
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>View</button></a>

           <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>Edit</button></a>

		   <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger m-1'>Delete</button></a>
			
                </div>
		";
			
		}


    

     else if(strlen($content)>=1 && strlen($upload_image) >= 1){

		if($i==1){
			echo"
			
			<div class='col-sm-4'>
			</div>
			";
		 }
			echo"
			    <div id='posts'class='col-sm-8'>
						<p><img id='im_1'src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						
						
							<h3 id='err1'><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 id='err2' style=''><small style='color:blue;'>Updated a post on <strong>$post_date</strong></small></h4>
					


					
							<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>View</button></a>

           <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>Edit</button></a>

		   <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger m-1'>Delete</button></a>
               </div>				
		";
			
		}


else{
			
	
	 if($i==1){
			echo"
			
			<div class='col-sm-4'>
			</div>
			";
		 }
	echo"
			
				
     
              <div id='posts'class='col-sm-8'>
				
					
						<p><img id='im_1'src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						
							<h3 id='err1'><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 id='err2' style=''><small style='color:blue;'>Updated a post on <strong>$post_date</strong></small></h4>
					

				
					
							<h3><p>$content</p></h3>
							<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>View</button></a>

           <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info m-1'>Edit</button></a>

		   <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger m-1'>Delete</button></a>
							
		      </div>	
					
	";
	
	}

		/*jokhon akjon user login obostai thakbe tokhon se jodi arekjon userer profile jete chai url er maddome ta se korte parbe ne ar er funtionality akhane kora hoiche*/
		global $con;

		if(isset($_GET['u_id'])){
			$u_id=$_GET['u_id'];
			
		}

		$get_posts="select user_email from users where user_id='$u_id'";
		$run_user=mysqli_query($con,$get_posts);

		$row=mysqli_fetch_array($run_user);
		$user_email=$row['user_email'];

		$user=$_SESSION['user_email'];
		$get_user="select * from users where user_email='$user'";
		$run_user=mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);

		$user_id=$row['user_id'];
		$u_email=$row['user_email'];

		if($u_email!=$user_email){
			echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
		 } 
		 
		 //else{
		// 	echo"
        //  <div id='posts'class='col-sm-8'>
        //    <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a>

        //    <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a>

		//    <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
		// </div>		

		// 	";
		// }
		$i=1;

     }

     include("functions/delete_post.php");
		
			

	?>

    </div>


</body>
</html>