 <style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 150px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>
<h3>Archives</h3>
 <?php
  $userQ="select * from category where status='active' order by id desc LIMIT 12";
		$userRes=mysql_query($userQ) or die(mysql_error());
if($count=mysql_num_rows($userRes))
	{
		while ($userRow=mysql_fetch_assoc($userRes)) 
		{
			$category=$userRow['category'];

?>

<div class="gallery">
  <a href="#">
    <img src="assets/images/<?php echo $category;?>/<?php echo $userRow['pic']; ?>" alt="Trolltunga Norway" width="300" height="200">
  </a>
  <div class="desc"><?php echo $userRow['category'];?></div>
</div>
<?php
		}
	}
  $userQ1="select * from video where status='active' order by Date desc LIMIT 12";
		$userRes1=mysql_query($userQ1) or die(mysql_error());
if($count1=mysql_num_rows($userRes1))
	{
		while ($userRow1=mysql_fetch_assoc($userRes1)) 
		{

?>

<div class="gallery" style="width:28%;float:left;">
	<video width="100%" controls>
      <source src="video/<?php echo $userRow1['video'];?>" type="video/mp4">
  </video>
  <div class="desc"><?php echo $userRow1['subject'];?></div>
</div>
<?php
		}
	}
?>