<?php
if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];
echo "<div style='width:100%'>";
			
 		 $userQ="select * from category where status='active' and id='$cid' order by id desc LIMIT 12";
		 $userRes=mysql_query($userQ) or die(mysql_error());
	if($count=mysql_num_rows($userRes))
		{
			while ($userRow=mysql_fetch_assoc($userRes)) 
			{
					$category=$userRow['category'];
	?>

            <div class="gallery">
              <a href="">
                 <img src="assets/images/<?php echo $category;?>/<?php echo $userRow['pic']; ?>" alt="Trolltunga Norway" width="300" height="200">
              </a>
              <div class="desc"><?php echo $userRow['category'];?></div>
            </div>
		<?php
                }
            }
          echo "</div>"; 
}
?>