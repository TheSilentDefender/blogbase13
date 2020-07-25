<?php
if(isset($_GET['id']))
{
	$cid=$_GET['id'];
                                    $q = "select * from category order where id='$cid'";
                                    $r = mysql_query ($q) or die (mysql_error());
                                        while($r1=mysql_fetch_array($r))
                                        {
											$cat=$r1['category'];
											$id=$r1['id'];
											$userQ1=mysql_query("select * from category where id='$cat'") or die(mysql_error());
											$res=mysql_fetch_assoc($userQ1);
											
										?>
                                <p class="show-read-more"><h5><?php echo $r1['category'];?>:</h5></p>
                                <?php
								
									
										}
 }
?>