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

<title>View Your Post</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
	
	.forme{
		width: 500px;
	}

	.comment{

		border:1px solid red;
		margin-bottom: 3px;
		border-radius: 4px;
		font-size: bold;
		color:; 
	}
</style>
</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<center><h2>Comments</h2><br></center>

		<?php single_post();?>
	</div>
</div>
</body>
</html>