<?php
session_start();
$user_name=$_SESSION['username'];
session_unset($user_name);
session_destroy();
header("location:index.php");
?>