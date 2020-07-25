<?php
error_reporting(1);
if ($_SERVER['HTTP_HOST'] == 'localhost')
{
$HostName="localhost";
$UserName="root";
$PassWord="";
$DatabaseName="online_news";

mysql_connect("$HostName", "$UserName", "$PassWord") or die(mysql_error());
mysql_select_db("$DatabaseName") or die(mysql_error());	

}
else
{
$HostName="localhost";
$UserName="root";
$PassWord="";
$DatabaseName="online_news";

mysql_connect("$HostName", "$UserName", "$PassWord") or die(mysql_error());
mysql_select_db("$DatabaseName") or die(mysql_error());	
}

?>