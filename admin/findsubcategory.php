
<span>Sub Category :</span>
<select name="subcategory" >
	<option value="">Select Sub Category</option>
<?php
include '../config.php';
$category=$_REQUEST['category'];
echo $userQ = "select * from subcategory where category='$category'";
$userRes = mysql_query ( $userQ ) or die ( mysql_error () );
while ( $userRow = mysql_fetch_assoc ( $userRes ) ) {
	?>
<option value="<?php echo $userRow['id']; ?>"><?php echo $userRow['subcategory']; ?></option>
<?php } ?>
</select>