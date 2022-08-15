<?php


$get_id=$_GET['post_id'];

$get_com="select * from comments where post_id='$get_id' ORDER by 1 DESC";
$run_com=mysqli_query($con,$get_com);

while($row=mysqli_fetch_array($run_com)){
	$com=$row['comment'];
	$com_name=$row['comment_author'];

	$date=$row['date'];

	echo"

    <div class='row'>
    <div class='col-md-4'></div>
        <div class='col-md-6'>
           

            <div class='comment'>
    <h4><strong>$com_name</strong><i>commented</i> on $date</h4>
    <p>$com</p>

            </div>


               
       </div>
    </div>

	";
}

?>