<?php
ob_start ();
@session_start ();
include ("../config.php");

$category = $_REQUEST ['category'];

$catnew=str_replace("&","",$category);

$qry = "select * from category where category='$category'";
$run = mysql_query ( $qry );

$count = mysql_num_rows ( $run );
if ($count == 0)
	{
	$imgN=$_FILES['img']['name'];
	$query = "insert into category set category='$category',pic='$imgN'";
	
	$run = mysql_query ( $query );

	if(!file_exists("../assets/images/$category"))
	{
		mkdir("../assets/images/$category");
		move_uploaded_file($_FILES['img']['tmp_name'],"../assets/images/$category/".$_FILES['img']['name']);
		
	}
	
	
	$_SESSION ['msg'] = 'Added Successfully !';
	header ( "location:view_category.php" );

}
 else {
	$_SESSION ['msg'] = 'Already Exist';
	
	header ( "location:view_category.php" );
	// echo mysql_error();
}

?>
