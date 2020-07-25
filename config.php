<?php
error_reporting(1);
if ($_SERVER['HTTP_HOST'] == 'localhost')
{
$HostName="localhost";
$UserName="root";
$PassWord="";
$DatabaseName="base13";

mysql_connect("$HostName", "$UserName", "$PassWord") or die(mysql_error());
mysql_select_db("$DatabaseName") or die(mysql_error());	

}
else
{
$HostName="localhost";
$UserName="user";
$PassWord="password";
$DatabaseName="base13";

mysql_connect("$HostName", "$UserName", "$PassWord") or die(mysql_error());
mysql_select_db("$DatabaseName") or die(mysql_error());	
}

?>