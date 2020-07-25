<?php
session_start();
include('config.php');
$n_id=$_SESSION['n_id'];	
$e = $_REQUEST['email'];
$comments = $_REQUEST['comments'];

$que="select * from register where email='$e'";
	$row1=mysql_query($que) or die(mysql_error());
	$res=mysql_fetch_assoc($row1); 
	$user_id=$res['id'];

$query = "insert into comments  user_id='$user_id',news_id='$n_id',message='$comments',comment_date=now()";
	
	$run = mysql_query ( $query );
	$c_id = mysql_insert_id ();
$que1 = "SELECT * FROM comments where user_id='$id' and news_id='$n_id' ORDER BY c_id DESC";
$result=mysql_query($que1) or die(mysql_error());
while($row=mysqli_fetch_array($result)){
	
	$d=$row['comment_date'];
	$date=date_create($d);
	$com_date=date_format($date,"d-m-Y");
echo "<div class='comments_content'>";
echo "<h4 style='text-align:right;'><a href='deleteComment.php?id=" . $row['c_id'] . "' title='remove'> X</a></h4>";
/*echo "<h4 style='color:blue;'>" . $res['fname'] ." ". $res['lname'] ."</h4>";*/
echo "<h6 style='color:grey'>" . $com_date. "</h6></br>";
echo "<h5>" . $row['message'] . "</h5>";
echo "</div>";
}

?>
