<?php
session_start ();
include ('../config.php');

$id = $_GET ["id"];

unlink("../video/".$_GET['videoName']);

$query = "delete from video where id='$id'";

mysql_query ( $query ) or die ( mysql_error () );

header('Location:view_video.php');

exit ();

?>