<?php
@ob_start();
@session_start();
include("../config.php");
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];


if($status=='active')
{
	$qry1="update product set status='inactive' where id='$id'";
	$rn1=mysql_query($qry1);
	header("location:view-product.php");
}
if($status=='inactive')
{
	$qry1="update product set status='active' where id='$id'";
	$rn1=mysql_query($qry1);
	header("location:view-product.php");
}
?>