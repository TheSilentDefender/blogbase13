<?php
include('config.php');
if(isset($_GET['id'])){
 $id = $_GET['id'];
	
	$query = "delete from comments where c_id='$id'";

mysql_query ( $query ) or die ( mysql_error () );
header("location: index.php?page=showComment");


}

?>