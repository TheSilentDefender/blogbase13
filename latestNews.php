<marquee direction="up"  scrollamount="3" onmouseover="stop()" onmouseout="start()" height="150px">                                
									<?php
                                    $qban = "select * from subcategory order by id DESC LIMIT 10";
                                    $rban = mysql_query ($qban) or die (mysql_error());
                                        while($rban1=mysql_fetch_array($rban))
                                        {
											$cat=$rban1['category'];
											$id=$rban1['id'];
											$userQ1=mysql_query("select * from category where id='$cat'") or die(mysql_error());
											$res=mysql_fetch_assoc($userQ1);
											
										?>
                                <p class="show-read-more"><h5><?php echo "<a href='index.php?page=headlines&id=$id' style='text-decoration:none;'>".$rban1['date']."</a>"?>:</h5><?php echo "<a href='index.php?page=headlines&id=$id' style='text-decoration:none;'>".$res['category']."</a>"?><br><?php echo "<a href='index.php?page=headlines&id=$id' style='text-decoration:none;'>".$rban1['subcategory']."</a>"?></p>
                                <?php
								
									
								}
								?>
                                
                                </marquee>