<?php 
include 'include/session_check.php';
include '../config.php';?>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<div class="row full-width wrapper">
  <div class="large-12 columns content-bg">
    <?php include 'include/header.php';?>
    <div class="row">
      <?php include 'menu.php';?>
      <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
          <div class="large-10 columns">
            <div class="page-name">
              <h3 class="left">All enquiry</h3>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div id="inbox">
          <div class="row">
            <div class="large-12 columns">
              <div class="custom-panel blue-bg">
                <div class="custom-panel-body">
                  <table class="width-100 custom-table responsive js-dynamitable" id="resultTable">
                    <thead>
                      <tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>                       
						<th>Subject</th>
						<th>Query</th>
						<th>Date</th>
						<th>Delete</th>
                
                     
                      </tr>
                      </thead>
                        <tbody id="fbody">
					    <?php
						$count = 1;
						$userQ1 = "select * from contact";
						$userRes1 = mysql_query ($userQ1) or die (mysql_error());
						while ($userRow1 = mysql_fetch_assoc($userRes1)){
						
						?>
                      <tr>
						<td><?php echo $userRow1['name']?></td>
						<td><?php echo $userRow1['mobile'];?></td>
                        <td><?php echo $userRow1 ['email'];?></td>
                        <td><?php echo $userRow1 ['subject'];?></td>
                        <td><?php echo $userRow1 ['Description'];?></td>
						<td><?php echo $userRow1 ['enquiry_date'];?></td>
						<td><a href="delete_contact.php?id=<?php echo $userRow1['id']; ?>">Delete</a></td>
						
						<?php }?>
				
              </tbody>    
                  </table>
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
