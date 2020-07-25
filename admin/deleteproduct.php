<?php
session_start ();
include ('../config.php');

$id = $_GET ["id"];

$query = "delete from product where id='$id'";

mysql_query ( $query ) or die ( mysql_error () );



header('Location:view-product.php');

exit ();

?>