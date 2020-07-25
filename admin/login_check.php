<?php

@ob_start ();
@session_start ();
include ("../config.php");


$abc = $_POST ['login_id'];

$password = $_POST ['password'];

$checkAdminQuery = "SELECT * FROM admin WHERE admin_login_id='$abc' and admin_password='$password'";

$checkAdminRes = mysql_query ( $checkAdminQuery ) or die ( mysql_error () );

$checkAdminNum = mysql_num_rows ( $checkAdminRes );

if ($checkAdminNum == 1) {
	
	$checkAdminRow = mysql_fetch_assoc ( $checkAdminRes );
	
	$_SESSION ['admin_id'] = $checkAdminRow ['admin_id'];
	
	header ( "location:dashboard.php" );
	
	exit ();

} else {
	
	$_SESSION ['msg'] = '<span style="color:red;"><strong>Invalid User ID/ Password</strong></span>';
	
	
	header ( "location:index.php" );
	
	exit ();

}

?>