<?php include 'include/session_check.php';

include '../config.php';


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<title>Welcome To Admin</title>
<link rel="stylesheet" href="css/foundation.css" />
<link href="css/foundation-icons/foundation-icons.css" rel="stylesheet" />
<script src="js/vendor/modernizr.js"></script>
<link href="css/style.css" rel="stylesheet" />
<link href="css/flat-icon/flaticon.css" rel="stylesheet" />
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="css/todos.css" rel="stylesheet" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/themes/flat/style.css">
<?php

if (file_exists ( "Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/cazary.js" ));
?>
</head>
<body>
<div class="row full-width wrapper">
  <div class="large-12 columns content-bg">
    <?php include 'include/header.php';?>
    <div class="row">
      <?php include 'menu.php';?>
      <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div id="dashboard">
          <div class="row">
            <div class="large-12 columns">
              <div class="custom-panel">
                <div class="custom-panel-heading">
                  <h4>Edit COmments</h4>
                </div>
<?php
$id = $_REQUEST ['id'];
$userproduct="select * from comments where c_id='$id'";
$userResproduct=mysql_query($userproduct) or die(mysql_error());
$userRowproduct=mysql_fetch_assoc($userResproduct);
extract($_POST);
if(isset($update))
{
	mysql_query("update comments set message='$description' where c_id='".$_GET['id']."'");
	echo "<script>window.location='view_comments.php'</script>";
	
}
 
?>
                <div class="custom-panel-body">
                  <form action="" method="post">
                    
                    <label> <span>Comments :</span>
                      <textarea name="description"  id="id_cazary_full" style="height: 200px;" placeholder="Description" >
					  <?php echo htmlspecialchars($userRowproduct['message']);?> 
					  </textarea>
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgdescription"></div></label>					
                    <div class="clearfix"></div>
                    
                    
					
                    <label><span>&nbsp;</span>
                      <input type="submit" id="Text2" name="update" class="button tiny radius coral-bg  updateproduct" value="Update Comments">
                    </label>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="js/common.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$("#discount").keyup(function(){
		var discount=$("#discount").val();
			var market_price=$("#market_price").val();
		if(discount==0){
				$("#our_price").val(market_price);
		}else{	
		var our_price = market_price-(market_price*discount)/100;
		$("#our_price").val(Math.round(our_price));
		}
		});
	
});

	function findsubcat(obj){
		var category=obj.value;

		$.ajax({
			url : 'findsubcategoryforproduct.php',
			type : 'GET',
			data : 'category=' + category,
			success : function(result) {

					$("#subcategorybycat").html(result);

				}
		});
	}

	function findsubtocat(obj){
		var subcategory=obj.value;

		$.ajax({
			url : 'findsubtosubcategoryforproduct.php',
			type : 'GET',
			data : 'subcategory=' + subcategory,
			success : function(result) {

					$("#subtosubcategorybysubcat").html(result);

				}
		});
	}</script> 
<script type="text/javascript" src="Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/cazary.js"></script> 
<script type="text/javascript">
(function($, window)
{
	$(function($)
	{
		// that's it!
		$("textarea#id_cazary").cazary();

		// customized editor
		$("textarea#id_cazary_minimal").cazary({
			commands: "MINIMAL"
		});
		$("textarea#id_cazary_full").cazary({
			commands: "FULL"
		});
	});
})(jQuery, window);
		</script> 
<script src="js/foundation.min.js"></script> 
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script> 
<script src="js/plugins/morris/morris.js"></script> 
<script src="js/todos.js"></script> 
<script src="js/menu.js"></script> 
<script>
        $(document).foundation();      
    </script> 
<script src="js/morris-demo.js"></script> 
<
</body>
</html>