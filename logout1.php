<?php
session_start();
$email=$_SESSION['email'];
session_unset($email);
session_destroy();
header("location:index.php");
?>