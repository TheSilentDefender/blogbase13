<?php
session_start ();
include ('../config.php');

$id = $_GET ["id"];

$query = "delete from mainbanner where id='$id'";

mysql_query ( $query ) or die ( mysql_error () );



header('Location:banner.php');

exit ();

?>