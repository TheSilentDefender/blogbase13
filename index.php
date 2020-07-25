<?php
session_start();
ob_start();
include('config.php');
$n_id=$_SESSION['n_id'];

$val=''; 
 if(isset($_POST['submit']))
  {
	   if(!empty($_POST['name']))
	    { 
		$val=$_POST['name']; 
		} 
		else
		 {
			  $val='';
		}
 }
  ?>

<!doctype html>
<html>
<head>

  <title>e-NEWSPAPER</title>
 <!--link bootstrap-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link  rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="js/jquery_library.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="mystyle.css">

 <style>
#content
{
padding:50px;
width:500px; border:1px solid #000;
float:left;
}
#clear
{ clear:both; }
#box
{
float:left;
margin:0 0 20px 0;
text-align:justify;
}
</style>
<!--search-->
<script type="text/javascript" src="jquerysearch.min.js"></script>

<script type="text/javascript">
	function fill(Value)
	{
	$('#name').val(Value);
	$('#display').hide();
	}
	
	$(document).ready(function(){
		$("#name").keyup(function() {
		var name = $('#name').val();
		if(name=="")
		{
		$("#display").html("");
		}
		else
		{
		$.ajax({
		type: "POST",
		url: "search.php",
		data: "name="+ name ,
		success: function(html){
		$("#display").html(html).show();
		}
	});
	}
	});
});
</script>
   
<!------------//script for read more---//****---------->
 <script type="text/javascript">
$(document).ready(function(){
	var maxLength = 300;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="index.php?page=read" class="read-more">read more...</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
	});
});
</script>


<style type="text/css">
div.goog-te-gadget-simple{border-radius:5px;background-color:#F7575A;}
a.goog-te-menu-value{text-decoration:none;}
a.goog-te-menu-value > span{color:#ffffff;}

    .show-read-more .more-text{
        display: none;
    }
</style> 
 <!----end of read more script------> 
</head>

<body>

<div class="container-fluid">
	<div class="row">
    <div class="col-sm-1"></div>
		<div class="col-sm-4" style="margin-top:10px;height:80px;">
 		 <h2 style="font-family:allan;font-size:50px;">e-<font color="red" style="font-family:yesteryear;">NEWSPAPER</font></h2>
		</div> 
		<div class=" col-sm-offset-3 col-sm-4" style="margin-top:33px;height:80px;">
      
		 <a href="#"><i class="fa fa-apple dropbtn1"></i></a>
		 <a href="#"><i class="fa fa-android dropbtn2"></i></a>
		 <a href="#"><i class="fa fa-facebook dropbtn3"></i></a>
		 <a href="#"><i class="fa fa-google-plus dropbtn4"></i></a>
 		 <a href="#"><i class="fa fa-twitter dropbtn5"></i></a>
 		 <a href="#"><i class="fa fa-youtube dropbtn6"></i></a>
 		 <a href="#"><i class="fa fa-rss dropbtn7"></i></a>
       
 	</div>	
	 
      
   </div>
</div>
<div class="container-fluid">
  	<div class="row">
    	<div class="col-sm-12">
        	<div class="col-sm-3">
            <div style="margin:0px auto;">
                <div id="google_translate_element"></div>
				<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
		
            </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-5" style="float:right;margin:0px 0px;">
           <form method="post" action="">
  				 <input type="text"  class="form-control"
				 style="width:60%;" autocomplete="off" name="name" id="name" value="<?php echo $val;?>" placeholder="Search..." class="fa fa-search dropbtn"/>
                 <button type="submit" class="btn btn-secondary" name="submit" id="submit"><font color="#000000"><i class="fa fa-fw fa-search"></i>Search</font></button>
   			<div id="display" style="position:absolute;overflow:auto;z-index:1;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);"></div> 
           </form>
   				
            </div>
          </div>
		</div>

 </div>	
 
        	<?php
			@$x= $_REQUEST['page'];
			include('header.php');?>

       
			<?php 
				if($x=="")
				{
				include('slider.php');
				}
				?>
        
       
<div class="container" style="margin-top:10px;">
  <div class="row">
  <div class="col-sm-1"></div>
    <div class="col-sm-7">
		<?php 
       if(isset($_POST['submit'])) 
       {
        if(!empty($_POST['name']))
		 {
			include('searchDetail.php');
		 }
	   }
			 
	 	@$x= $_REQUEST['page'];
		if($x=="")
		{
			$userQ=mysql_query("select * from  news ORDER BY ID DESC limit 10") or die(mysql_error());

			while($res=mysql_fetch_assoc($userQ))
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
			$imgPath1="assets/images/".$cat_name."/".$Sub_cat_name."/".$res['pic2'];
			//echo $imgPath;			
			 
			 echo "<h1 style='color:red'>".$res['product_name']."</h1>";
			 echo "<img  src='$imgPath' style='width:600px;height:300px;' class='img-thumbnail'/>";
			 echo "<img  src='$imgPath1' style='width:600px;height:300px;' class='img-thumbnail'/>";
			 echo "<p>".$res['description']."</p>";          
			}
		}
		
		elseif($x=="headlines")
		{
		 include('headlines.php');
		}
		elseif($x=="archive")
		{
		 include('archive.php');
		}
		elseif($x=="contact")
		{
		 include('contact.php');
		}
		elseif($x=="gallery")
		{
		 include('gallery.php');
		}
		elseif($x=="changePass")
		{
		 include('changePass.php');
		}
		elseif($x=="category")
		{
		 include('category.php');
		}
		elseif($x=="login")
		{
		 include('login.php');
		}
		elseif($x=="registration")
		{
		 include('registration.php');
		}
		
		elseif($x=="flip")
		{
		?>
			<div style="margin-top:auto">
         <?php
			include('flip/flipPaper/flip.php');
			echo "</div>";

		
		}
		elseif($x=="read")
		{
			include("readmore.php");
			
		}
	?>
    <br>
    </div>
    
	   <?php  
	   if($x=="")
	   { 
	?>

	<div class="col-sm-3" style="margin-top:75px">
		<div style="position:relative;height:0;padding-bottom:56.25%"><iframe src="https://www.youtube.com/embed/E9AUCNvYLTg?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
		
		<div style="position:relative;height:0;padding-bottom:56.25%;margin-top:20px"><iframe src="https://www.youtube.com/embed/8Gj5fxkJCgs?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>	
         
		 <div style="position:relative;height:0;padding-bottom:56.25%;margin-top:20px;margin-bottom:10px"><iframe src="https://www.youtube.com/embed/0VMBt7Jwolg?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
		 <div class="panel-heading" style="border-radius:0px;background-color:red;color:white;text-align:center">LATEST NEWS
         </div>
            <div class="panel-body" style="border:1px solid #D5D4D4;">
            	<?php include('latestNews.php');?>
   			 </div>
             
         <div class="panel-heading" style="border-radius:0px;background-color:red;color:white;text-align:center;"> VIDEOS
       </div>
              <div class="panel-body" style="border:1px solid red;">
              	<?php include('video.php');?>
   			 </div>
    </div>
	   <?php } ?>
             
  </div>
			
<div class="col-sm-1"></div>
</div>


<div class="col-sm-12" style="text-align:center" id="footer">
	<?php include('footer.php'); ?>
</div>
</body>
</html>
<?php 
ob_end_flush(); 
?>

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