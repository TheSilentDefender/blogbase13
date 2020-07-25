  <?php
  $userQ="select * from video where status='active' order by Date desc";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count=mysql_num_rows($userRes))
		{
		while ($userRow=mysql_fetch_assoc($userRes)) 
		{

?>
			<video width="100%" controls>
                  <source src="video/<?php echo $userRow['video'];?>" type="video/mp4">
                </video>
               
      <p  class="show-read-more"><?php echo $userRow['subject'];?></p>
       <p class="show-read-more"><?php echo $userRow['description'];?></p>
        <a href="index.php" ><?php if(isset($_SESSION['email'])){echo "Comment";}?></a>
        <?php
		}
	?>	
                <hr>
			 <?php
		}
	?>	