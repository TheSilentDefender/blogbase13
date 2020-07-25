<?php 
session_start();
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$userQ=mysql_query("select * from  news where id ='$id'") or die(mysql_error());

	$res=mysql_fetch_assoc($userQ); 
			
			 
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
			$imgPath1="assets/images/".$cat_name."/".$Sub_cat_name."/".$res['pic2'];
			//echo $imgPath;			
			 
			 echo "<h1 style='color:red'>".$res['product_name']."</h1>";
			 echo "<img  src='$imgPath' style='width:600px;height:300px;' class='img-thumbnail'/>";
			 echo "<img  src='$imgPath1' style='width:600px;height:300px;' class='img-thumbnail'/>";
			 echo "<p>".$res['description']."</p>";
				
		
}
	?>
	<?php
include('config.php');

	
?>
<link href="#" rel="stylesheet" type="text/css">
<?php if($_SESSION['email']=="")
{?>
	<button type="button" class="button" data-toggle="modal" data-target="#myModal1">Post Your Comments</button>
	<?php 
}	
else
{
?>
	
    <div class="comment_input">
        <form  method="post">
        	<input type="text" readonly="readonly"   value="<?php echo $_SESSION['email'];?>" name="email" placeholder="email id..."/></br></br>
            <textarea name="comments" rows="5" placeholder="Leave Comments Here..." class="form-control "></textarea></br></br>
            <input type="submit" name="submit"  style="text-decoration:none;" class="button" value="Add Comment" ></br>
        </form>
    </div>
	
	<?php
}	
extract($_POST);
if(isset($submit))
{
include('config.php');
$e = $_REQUEST['email'];
$comments = $_REQUEST['comments'];
$news_id=$_SESSION['id'];

	$que="select * from register where email='$e'";
	$row1=mysql_query($que) or die(mysql_error());
	$res=mysql_fetch_assoc($row1); 
	$user_id=$res['id'];

$query = "insert into comments  values('','$user_id','$news_id','$comments',now())";
$run = mysql_query ( $query );
echo "<script>alert('Comments added Successfully !')</script>";
}

	
//$c_id = mysql_insert_id ();

$que1 = "SELECT * FROM comments where news_id='".$_SESSION['id']."' ORDER BY c_id DESC";
$result=mysql_query($que1) or die(mysql_error());
while($row=mysql_fetch_array($result))
{
	
$d=$row['comment_date'];
$date=date_create($d);
$com_date=date_format($date,"d-m-Y");
echo "<div class='comments_content'>";
echo "<h4 style='text-align:right;'><a href='' title='remove'></a></h4>";
echo "<h6 style='color:grey'>" . $com_date. "</h6></br>";
echo "<h5>" . $row['message'] . "</h5>";


$que11="select * from register where id='".$row['user_id']."'";
	$row11=mysql_query($que11) or die(mysql_error());
	$res21=mysql_fetch_assoc($row11); 
	
echo "<strong>" . $res21['email'] . "</strong>";
echo "</div>";
}

?>

 
