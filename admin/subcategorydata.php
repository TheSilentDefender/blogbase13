<?php 
include '../config.php';
$id=$_REQUEST['id'];
$userQ="select * from subcategory where id='$id'";
$userRes=mysql_query($userQ) or die(mysql_error());
$userRow=mysql_fetch_assoc($userRes);

	$cat=$userRow['category'];
$categorysearch="select * from category where id='$cat'";
	$userRescategory=mysql_query($categorysearch) or die(mysql_error());
	$userRowcategory=mysql_fetch_assoc($userRescategory); 
?>

<form action="update_subcategory.php?id=<?php echo $userRow['id']; ?>" method="post">
  <label> <span>Category : <?php echo $userRow['c_id']; ?></span>
    <select name="category" required>
      <option value="<?php echo $userRowcategory['id']; ?>"><?php echo $userRowcategory['category']; ?></option>
      <?php   
$userQ1="select * from category order by id desc";
$userRes1=mysql_query($userQ1) or die(mysql_error());
while ($userRow1=mysql_fetch_assoc($userRes1)) {
?>
      <option value="<?php echo $userRow1['id']; ?>"><?php echo $userRow1['category']; ?></option>
      <?php } ?>
    </select>
  </label>

  <label> <span>Sub Category :</span>
    <input type="text" name="subcategory" value="<?php echo $userRow['subcategory']; ?>" required>
  </label>
  <input type="submit" class="button tiny radius coral-bg right" name="submit" value="Update">
</form>
