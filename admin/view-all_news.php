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
        <div id="inbox">
          <div class="row">
            <div class="large-12 columns">
              <div class="custom-panel blue-bg">
                <div class="custom-panel-body"> <br />
                  <a class="button tiny radius success lable js-open-modal btn" href="add-news.php">Add News</a> <br>
                  <br>
                  <br>
                  <table class="width-100 custom-table responsive js-dynamitable" id="resultTable">
                    <thead>
                      <tr>
                        <td>&nbsp;</td>
                        <td ><input style="width:120px;" class="js-filter" type="text" value="" placeholder="Category"></td>
                        <td ><input style="width:120px;" class="js-filter" type="text" value="" placeholder="Subcategory"></td>
                     
                        <td ><input style="width:120px;" class="js-filter" type="text" value="" placeholder="Product Name"></td>
                        <td >&nbsp;</td>
                      </tr>
                    </thead>
                    <thead>
                      <tr>
                        <td>S. No.</td>
                        <td>Category</td>
                        <td>Sub Category</td>
               
                        <td>Product Name</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody id="fbody">
                      <?php
  
  $count=1;
  
        $userQ="select * from news";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count1=mysql_num_rows($userRes)){
			
		while ($userRow=mysql_fetch_assoc($userRes)) {

		//print_r($userRow);

	
	$cat=$userRow['category'];
$categorysearch="select * from category where id='$cat'";
	$userRescategory=mysql_query($categorysearch) or die(mysql_error());
	$userRowcategory=mysql_fetch_assoc($userRescategory); 



	$catsubcategory=$userRow['subcategory'];
$categorysearchsubcategory="select * from subcategory where id='$catsubcategory'";
	$userRescategorysubcategory=mysql_query($categorysearchsubcategory) or die(mysql_error());
	$userRowcategorysubcategory=mysql_fetch_assoc($userRescategorysubcategory); 

?>
                      <tr>
                        <td><?php echo $count++; ?>.</td>
                        <td><?php echo $userRowcategory['category']; ?></td>
                        <td><?php echo $userRowcategorysubcategory['subcategory']; ?></td>
                  
                        <td><?php echo substr($userRow['product_name'],0,20); ?></td>
                        <td><a class="alert label" href="editproduct.php?id=<?php echo $userRow['id'];?>" style="color: black; background-color: white; border: 1px solid !important;">Edit</a> <a onClick="return confirm('Are you sure you want to delete?')" href="deleteproduct.php?id=<?php echo $userRow['id'];?>" class="label"> Delete</a>
                          <?php
		if ($userRow ['status'] == 'active') {
			?>
                          <a class="label success" href="productstatus.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Active</a>
                          <?php
		} else {
			?>
                          <a class="alert label" href="productstatus.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Inactive</a>
                          <?php
		}
		?>
                          </tr>
                      <?php
		}}else {
			echo "<tr><td colspan='9'>No Data....</td></tr>";
		}
		?>
                  </table>
                  
                  <!-- <ul class="pagination">
                                            <li class="arrow unavailable"><a href="#">&laquo;</a></li>
                                            <li class="current"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li class="unavailable"><a href="#">&hellip;</a></li>
                                            <li><a href="#">12</a></li>
                                            <li><a href="#">13</a></li>
                                            <li class="arrow"><a href="#">&raquo;</a></li>
                                        </ul> --> 
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
<script type="text/javascript">
$(document).ready(function(){

$(".categorydata").click(categoryData);

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

function categoryData(){
	var id=$(this).attr("rel");
	$.ajax({
		url : 'editproduct.php',
		type : 'GET',
		data : 'id=' + id,
		success : function(result) {

				$("#editcategory1").html(result);

			}
	});
}

</script> 
<script src="js/dynamitable.jquery.min.js"></script> 
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
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script> 
<script src="js/plugins/morris/morris.js"></script> 
<script src="js/todos.js"></script> 
<script src="js/menu.js"></script> 
<script>
        $(document).foundation();      
    </script> 
<script src="js/morris-demo.js"></script>
<style>
    page_links
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  padding: 6px;
  margin: 3px;
  background-color: #cccccc;
  text-decoration: none;
 }
 #page_a_link
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  color: #ff0000;
  background-color: #cccccc;
  padding: 6px;
  margin: 3px;
  text-decoration: none;
 }

    
    
    </style>
</body>
</html>