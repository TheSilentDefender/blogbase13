<?php
session_start ();
include ('../config.php');

$id = $_GET ["id"];

$query = "delete from comments where c_id='$id'";

mysql_query ( $query ) or die ( mysql_error () );



header('Location:view_comments.php');

exit ();

?>