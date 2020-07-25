<?php
@ob_start ();
@session_start ();
include ("../config.php");

$category = $_REQUEST ['category'];
$subcategory = mysql_real_escape_string($_REQUEST ['subcategory']);

$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_" );
$catnew = str_replace ( $chars, "-", $subcategory );


$query = "insert into subcategory set category='$category', subcategory='$subcategory',date=NOW()";

	$category = $_REQUEST ['category'];
		$run1 = mysql_query ("select * from category where id='$category'");
		$run2=mysql_fetch_array($run1);
		$cat=$run2['category'];
	

$rst = mysql_query ( $query ) or die ( mysql_error () );
if ($rst)
	{
		
		if(!file_exists("../assets/images/$cat/$subcategory"))
		{
			mkdir("../assets/images/$cat/$subcategory");
			
		}

	$_SESSION ['msg1'] = 'Added Successfully !';
	
	header ( "location:subcategory.php" );

} else {
	$_SESSION ['msg1'] = 'Sub Category Not Added !';
	
	header ( "location:subcategory.php" );

}

?>