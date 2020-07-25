<?php
ob_start ();
@session_start ();
include ("../config.php");

$category = $_REQUEST ['category'];
$subcategory = mysql_real_escape_string($_REQUEST ['subcategory']);

$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_" );
$catnew = str_replace ( $chars, "-", $subcategory );

$id = $_REQUEST ['id'];

$query = "update subcategory set category='$category', subcategory='$subcategory', date=NOW() where id='$id'";
$rst = mysql_query ( $query ) or die ( mysql_error () );


if ($rst) {
	
	$_SESSION ['msg1'] = 'Sub Category Changed Successfully !';
	
	header ( "location:subcategory.php" );

} else {
	$_SESSION ['msg1'] = 'Sub Category Not Added !';
	
	header ( "location:subcategory.php" );

}

?>