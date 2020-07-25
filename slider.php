<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      
       <?php
		$qban = "select * from mainbanner";
		$rban = mysql_query ($qban) or die (mysql_error());
		$rban1=mysql_fetch_array($rban);
		$img1= $rban1['img'];
    echo '<div class="item active" style="border:solid">';
		echo "<img src='assets/images/sliders/$img1' style='width:1500px;height:200px' alt='image not found'>";
		
		?>

	
        <div class="carousel-caption">
          <h3 style="color:#000000;"><?php echo $rban1['h1'];?></h3>
          <p><?php echo $rban1['h2'];?></p>
          <p><?php echo $rban1['h3'];?></p>
        </div>
      </div>
      <?php 
		$qban1 = "select * from mainbanner";
    $rban1 = mysql_query ($qban) or die (mysql_error());
    while($res1=mysql_fetch_array($rban1))
    {

       $img= $res1['img'];
       if($img==$img1)
       {

       }
       else
       {
           echo '<div class="item" style="border:solid">';
           echo '<img src="assets/images/sliders/'.$img.'" style="width:1500px; height:200px" alt="image not found" style="border:solid">';
            echo '<div class="carousel-caption" >';
       echo '<h3 style="color:#000000;">'.$res1['h1'].'</h3>';
       echo '<p>'.$res1['h2'].'</p>';
        echo '<p>'.$res1['h3'].'</p>';
       echo '</div>';
       echo '</div>';
       }
       
    }
    ?>

    
      
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <style>
 
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
   
	 margin:auto;
  }
 p{color:#000000;}
 
</style>

