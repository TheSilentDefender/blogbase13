<?php 
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$_SESSION['id']=$id;
 $userQ=mysql_query("select * from  news where subcategory ='$id'") or die(mysql_error());

		while ($res=mysql_fetch_assoc($userQ)) 
		{
			
			 
			 $cat=$userRow['category'];
			$sub_cat=$userRow['subcategory'];
			
			$cat=mysql_query("select * from category where id='".$res['category']."'");
			$resCat=mysql_fetch_assoc($cat);
			$cat_name=$resCat['category'];
			//echo $cat_name;
			
			$subcat=mysql_query("select * from subcategory where id='".$res['subcategory']."'");
			$resSubCat=mysql_fetch_assoc($subcat);
			$Sub_cat_name=$resSubCat['subcategory'];
			
			$imgPath="assets/images/".$cat_name."/".$Sub_cat_name."/".$res['pic1'];
			//echo $imgPath;			
			 
			 echo "<a href='index.php?page=read&id=".$res['id']."'><h1 style='color:red'>".$res['product_name']."</h1>";
			 echo "<img  src='$imgPath' class='img-thumbnail'/></a>";
			 echo "<a href='index.php?page=read&id=".$res['id']."'><p>".substr($res['description'],0,20)." ..........</p></a>
			 <a href='index.php?page=read&id=".$res['id']."'>Read More</a>";
				
		}
}
	?>

	