<?php 
extract($_POST);
include('config.php');

if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query1="SELECT * FROM category WHERE category LIKE '%$name%'";
$res1 = mysql_query ($query1) or die (mysql_error());

$query2="SELECT * FROM subcategory WHERE subcategory LIKE '%$name%'";
$res2 = mysql_query ($query2) or die (mysql_error());

$query3="SELECT * FROM news WHERE description LIKE '%$name%' OR product_name LIKE '%name%'";
$res3 = mysql_query ($query3) or die (mysql_error());

	
	echo "<ul style='list-style:none;margin: 0px 0px 0px -38px;width: 330px;'>";
while($r1=mysql_fetch_array($res1))
{
?>

<li style="display:block;padding:5px;background-color:#fff;border-bottom:0px solid #000;color:black;position:relative;" onclick='fill("<?php echo $r1['category']; ?>")'><?php echo $r1['category']; ?></li>
<?php
}
while($r2=mysql_fetch_array($res2))
{
?>

<li style="display:block;padding:5px;background-color:#fff;border-bottom:0px solid #000;color:black;position:relative;" onclick='fill("<?php echo $r2['subcategory']; ?>")'><?php echo $r2['subcategory']; ?></li>
<?php
}
while($r3=mysql_fetch_array($res3))
{
?>

<li style="display:block;padding:5px;background-color:#fff;border-bottom:0px solid #000;color:black;position:relative;" onclick='fill("<?php echo $r3['product_name']; ?>")'><?php echo $r3['product_name']; ?></li>
<?php
}
}
?>
</ul>
