<?php
ob_start ();
@session_start ();
include ("../config.php");

$title = $_REQUEST ['title'];

$titlenew=str_replace("&","",$title);

$qry = "select * from flip where title='$title'";
$run = mysql_query ( $qry );

$count = mysql_num_rows ( $run );
if ($count == 0)
	{
	$imgN=$_FILES['img']['name'];
	$query = "insert into flip set title='$title',pic='$imgN'";
	
	$run = mysql_query ( $query );

		move_uploaded_file($_FILES['img']['tmp_name'],"../flip/flipPaper/pages/".$_FILES['img']['name']);
	
	
	$_SESSION ['msg'] = 'Added Successfully !';
	header ( "location:view_flip.php" );

}
 else {
	$_SESSION ['msg'] = 'Already Exist';
	
	header ( "location:view_flip.php" );
	// echo mysql_error();
}
 

?>
