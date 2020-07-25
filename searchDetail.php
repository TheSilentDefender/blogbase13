<?php
			  $name=$_POST['name'];
				$query1="SELECT * FROM category WHERE category LIKE '%$name%'";
				$res1 = mysql_query ($query1) or die (mysql_error());
				$r1=mysql_fetch_array($res1);
				$cid=$r1['id'];
				
				$query2="SELECT * FROM subcategory WHERE subcategory LIKE '%$name%'";
				$res2 = mysql_query ($query2) or die (mysql_error());
				$r2=mysql_fetch_array($res2);
				$sbid=$r2['id'];
			
				$query3="SELECT * FROM news WHERE description LIKE '%$name%' OR product_name LIKE '%name%' OR category='$cid' OR subcategory='$sbid'";
				$res3 = mysql_query ($query3) or die (mysql_error());

	
			   if($row=mysql_num_rows($res3))
			   {
				 	while ($r=mysql_fetch_assoc($res3)) 
						{
							
							
							echo "<h3><a href='index.php?page=read' 
							style='text-decoration:none;color:black;'>".$r1['category']."</a></h3>";
							
							$nid=$r['id'];
							echo "<a href=''><p>".$r['product_name']."</p></a>";
							
							echo "<p>".$r['description']."</p>";
							
				?>
				 <?php if(isset($_SESSION['email'])){echo "<a href='index.php?page=read&id=$id&n_id=$nid' style='text-decoration:none;'><i class='fa fa-comments-o' aria-hidden='true' style='size:85px'></i>Leave A Comment</a>";} ?>
					<hr>
					<?php
					
							if(isset($_GET['n_id']))
							{
								 $_SESSION['n_id']=$nid;
								
								include('comment.php');
								
							}
						}
  
			   }
			   else
				 {
					  echo "<font color='red' size='4px'>No result....</font>";
				 }
			
?>
			