<!DOCTYPE html>

<?php



include("header.php");

if(!isset($_SESSION['user_email'])){
	header("location:index.php");
}
error_reporting(0);
?>
<html>
<head>


	
	



	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<meta name="viewport" content="width=device-width">


	<title>Message</title>

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


#scroll_messages{
	max-height: 500px;
	overflow: scroll;
}

#btn_msg{
	width: 20%;
	height: 28px;
	border-radius: 5px;
	margin:5px;
	border:none;
	color: #fff;
	float: right;
	background-color: #2ecc71;
}

#select_user{
	max-height: 500px;
	overflow: scroll;
}

#green{
	background-color: #2ecc71;
	border-color: #27ae60;
	width: 45%;
	padding: 2.5px;
	font-size: 16px;
	border-radius: 3px;
	float: left;
	margin-bottom: 5px;
}

#blue{

	background-color: #3498db;
	border-color: #2980b9;
	width: 45%;
	padding: 2.5px;
	font-size: 16px;
	border-radius: 3px;
	float: right;
	margin-bottom: 5px;
}

	</style>


</head>
<body>


<div class="row">


<!--a logined user can message another user-->

	<?php
	if(isset($_GET['u_id'])){
    global $con;
    $get_id=$_GET['u_id'];
    $get_user="select * from users where user_id='$get_id' ";

    $run_user=mysqli_query($con,$get_user);

$row_user=mysqli_fetch_array($run_user);

$user_to_msg=$row_user['user_id'];
$user_to_name=$row_user['user_name'];

}

$user=$_SESSION['user_email'];

$get_user="select * from users where user_email='$user' ";

    $run_user=mysqli_query($con,$get_user);

$row=mysqli_fetch_array($run_user);

$user_from_msg=$row['user_id'];
$user_from_name=$row['user_name'];

	?>

	<div class="col-sm-3" id="select_user">


		<!--code for user profile-->
		
<?php
$user="select * from users";
$run_user=mysqli_query($con,$user);
while($row_user=mysqli_fetch_array($run_user)){
   $user_id=$row_user['user_id'];
   $user_name=$row_user['user_name'];
   $first_name=$row_user['f_name'];
   $last_name=$row_user['l_name'];
   $user_image=$row_user['user_image'];


 echo"

<div class='container-fluid'>
	<a style='text-decoration: none;cursor: pointer;color: #3897F0;' href='messages.php?u_id=$user_id'>
		
		<img class='rounded-circle' src='users/$user_image' width='90px' height='80px' title='$user_name'><strong>&nbsp $first_name $last_name</strong><br><br>
	</a>

</div>

 ";

}

?>
	</div>	
<!--code for one can pass message to another-->
<div class="col-sm-6">
	<div class="load_msg" id="scroll_messages">
		<?php




$sel_msg="select *from user_messages where(user_to='$user_to_msg' AND user_form='$user_from_msg') OR (user_form='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";

$run_msg=mysqli_query($con,$sel_msg);

while($row_msg=mysqli_fetch_array($run_msg)){
	
	$user_to=$row_msg['user_to'];
	$user_from=$row_msg['user_form'];
	$msg_body=$row_msg['msg_body'];
	$msg_date=$row_msg['date'];

	?>


<div>
	<p><?php  if($user_to==$user_to_msg AND $user_from==$user_from_msg){echo"<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";} else if($user_from==$user_to_msg AND $user_to==$user_from_msg){echo"<div class='message' id='green' data-toggle='tooltip'title='$msg_date'>$msg_body</div><br><br><br>";}?></p>
</div>

	<?php

}

		?>
	</div>
<!--headerer er message option a click korle tokhon $u_id=new if block er bitorer functionality kaj korbe ar na hole annota kaj korbe-->
	<?php
  if(isset($_GET['u_id'])){
  $u_id=$_GET['u_id'];

  if($u_id=="new"){

    

echo'
<form>
	<center><h3>Select Someone to start conversation</h3></center>

	<textarea disabled class="form-control"placeholder="Enter your Message "></textarea>

	<input type="submit" class="btn btn-default"disabled value="Send">
</form><br><br><br>

';

}else{
	
	echo'

<form action="" method="POST">
	

	<textarea  class="form-control"placeholder="Enter your Message " name="msg_box"id="message_textarea"></textarea>

	<input type="submit" name="send_msg" id="btn_msg" value="Send">
</form><br><br><br>


	';
}
}

	?>
<!--send message functionality by inserting data into data base-->
	<?php


if(isset($_POST['send_msg'])){
	
	$msg=htmlentities($_POST['msg_box']);

	if($msg==""){
	echo"<h4 style='color:red;text-align: center;'>Message was unable to send!</h4>";
}else if(strlen($msg)>37){
	echo"<h4 style='color:red;text-align: center;'>Message is too long!use only 37 characters</h4>";
}else{
	
	$insert="insert into user_messages (user_to,user_form,msg_body,date,msg_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
	$run_insert=mysqli_query($con,$insert);
echo"<script>window.open('messages.php?u_id=$u_id','_self')</script>";
}
}

	?>
</div>

<!--user information-->


	<div class="col-sm-3">
		<?php
	if(isset($_GET['u_id'])){
    global $con;
    $get_id=$_GET['u_id'];
    $get_user="select * from users where user_id='$get_id' ";

    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);

    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $f_name=$row['f_name'];
    $l_name=$row['l_name'];
    $describe_user=$row['describe_user'];
    $user_country=$row['user_country'];
    $user_image=$row['user_image'];
    $register_date=$row['user_reg_date'];
    $gender=$row['user_gender'];
    
}

if($get_id=="new"){
	
}else{
	echo"

<div class='row'>
	<div class='col-sm-2'>
		
	</div>
	<center>
		<div style='background-color: #e6e6e6;' class='col-sm-9'>
			<h2>Information About</h2>
			<img class='rounded-circle' src='users/$user_image' width='150' height='150'><br><br>

			<ul class='list-group'>
				<li class='list-group-item' title='Username'><strong>$f_name $l_name</strong></li>

				<li class='list-group-item' title='User ststus'><strong style='color: grey;'>$describe_user</strong></li>

				<li class='list-group-item' title='Gender'>$gender</li>

				<li class='list-group-item' title='Counytry'>$user_country</li>

				<li class='list-group-item' title='User Registation Date'>$register_date</li>
			</ul>
		</div>

		<div class='col-sm-1'></div>
</div>

	";
}
?>
	</div>

</div>

<!--page refresh korar por message jekhane show korbe user sekhane thakar jonno ata kora hoiche-->
	<script type="text/javascript">
		var div=document.getElementById("scroll_messages");
		div.scrollTop=div.scrollHeight;
	</script>	

</body>
</html>