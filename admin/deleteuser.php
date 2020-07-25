<?php
session_start ();
include ('../config.php');

$id = $_GET ["id"];

$query = "delete from register where id='$id'";

mysql_query ( $query ) or die ( mysql_error () );



header('Location:view-retailer.php');

exit ();

?>