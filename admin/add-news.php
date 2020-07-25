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
                <?php
	
					@$id = $_REQUEST ['id'];
				      $userQ="select * from category where id='$id'";
						$userRes=mysql_query($userQ) or die(mysql_error());
						$userRow=mysql_fetch_assoc($userRes);
					?>
                <div class="custom-panel-body">
                  <form action="insert_news.php" method="post" enctype="multipart/form-data">
                    <label> <span>Category :</span>
                      <select name="category" onChange="findsubcat(this)">
                        <option value="">Select Category</option>
                        <?php   
						 $userQ="select * from category";
						 $userRes=mysql_query($userQ) or die(mysql_error());
						 while ($userRow=mysql_fetch_assoc($userRes)) {
						?>
                        <option value="<?php echo $userRow['id']; ?>"><?php echo $userRow['category']; ?></option>
                        <?php } ?>
                      </select>
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgcategory"></div></label>					
                    <div class="clearfix"></div>
                    
                    <!-- Subcat -->
                    <label id="subcategorybycat"> <span>Sub Category :</span>
                      <select name="subcategory">
                      <option value="">Sub Category</option>
					                          <?php   
						 $userQ="select * from subcategory";
						 $userRes=mysql_query($userQ) or die(mysql_error());
						 while ($userRow=mysql_fetch_assoc($userRes)) {
						?>
                        <option value="<?php echo $userRow['id']; ?>"><?php echo $userRow['subcategory']; ?></option>
                        <?php } ?>
                      </select>
                    </label>
					  <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgsubcategory"></div></label>					
                    <div class="clearfix"></div>
                   
				   <label> <span>News Title</span>
                      <input type="text" name="product_name"  placeholder="news Title"/>
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgproduct_name"></div></label>					
                    <div class="clearfix"></div>

                    <label> <span>News Description :</span>
                      <textarea name="description"  id="id_cazary_full" style="height: 200px;" placeholder="Description" ></textarea>
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgdescription"></div></label>					
                    <div class="clearfix"></div>
                    
                    
					
					
                    <label> <span>Image 1</span>
                      <input type="file" name="pic1" />
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgpic1"></div></label>					
                    <div class="clearfix"></div>
                    
					<label> <span>Image 2</span>
                      <input type="file" name="pic2" />
                    </label>
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgpic2"></div></label>					
                    <div class="clearfix"></div>
                    
                   <label>
                    <input type="submit" id="Text2" class="button tiny radius coral-bg right validateproduct" value="Add">
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
	}
</script> 
<script type="text/javascript" src="Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/cazary.js"></script> 
<script type="text/javascript">
(function($, window){
	$(function($){
		$("textarea#id_cazary").cazary();
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
<script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  </script>
<style>
  .pincode{
  margin:0;
  padding:0;
  width:100%;
  float:left;
 
  }
  .pincode label{
  margin: 5px;
  padding:0 5px;
  height:30px;
  line-height:30px;
  font-size:12px;
  float:left;
  border:1px solid #eee;
  background-color:#f7f7f7;
  
  }
   .pincode label input[type="checkbox"]{
   float:left;
margin-top:9px;
margin-right:2px;
   
   }
	   
  
  </style>
</body>
</html>