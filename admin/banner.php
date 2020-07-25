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
                  <a class="button tiny radius success lable js-open-modal btn" href="mainbanner.php">Add Banner</a><br>
                  <br>
                  <br>
                  <table class="width-100 custom-table responsive">
                    <thead>
                      <tr>
                        <td>S. No.</td>
                        <td>Heading 1</td>
                        <td>Heading 2</td>
                        <td>heading 3</td>
                        <td>Image Name</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
  $count1=1;
        $userQ="select * from mainbanner order by Date desc";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count=mysql_num_rows($userRes)){
		while ($userRow=mysql_fetch_array($userRes)) {

	$cat=$userRow['category'];
$categorysearch="select * from category where id='$cat'";
	$userRescategory=mysql_query($categorysearch) or die(mysql_error());
	$userRowcategory=mysql_fetch_assoc($userRescategory); 
?>
                      <tr>
                        <td><?php echo $count1++; ?>.</td>
                        <td><?php echo $userRow['h1']; ?></td>
                        <td><?php echo ucfirst($userRow['h2']); ?></td>
                        <td><?php echo $userRow['h3']; ?></td>
                        <td><?php echo $userRow['img']; ?></td>
                        <td>
                        
                         <a onClick="return confirm('Are you sure you want to delete?')" href="delete_banner.php?id=<?php echo $userRow['id'];?>" class="label"> Delete</a>
                        
                        </td>
                      </tr>
                      <?php
		}}else{
			echo "<tr><td colspan='4'>No Data...</td></tr>";
		}
		?>
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
<!-- edit subcat -->
<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3>Edit Sub-Category</h3>
  </header>
  <div class="modal-body" id="editsubcat"> </div>
</div>
<!-- edit subcat --> 

<!-- add popup -->
<div id="popup2" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3> Add Sub Category</h3>
  </header>
  <div class="modal-body">
    <form action="insert_subcategory.php" method="post" enctype="multipart/form-data">
      <label> <span>Category :</span>
        <select name="category" required>
          <option value="">Select Category</option>
          <?php    $userQ="select * from category";
		$userRes=mysql_query($userQ) or die(mysql_error());
		while ($userRow=mysql_fetch_assoc($userRes)) {
			?>
          <option value="<?php echo $userRow['id']; ?>"><?php echo $userRow['category']; ?></option>
          <?php } ?>
        </select>
      </label>
      <label> <span>Sub Category :</span>
        <input type="text" name="subcategory" placeholder="Sub Category" required/>
      </label>
      <label><span>&nbsp;</span>
        <input type="submit" id="Text2" class="button tiny radius coral-bg right" value="Add">
      </label>
      <div class="clearfix"></div>
    </form>
  </div>
</div>
<!-- add pop up --> 

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){

$(".editsubcat").click(subCategoryData);

});
function subCategoryData(){
	var id=$(this).attr("rel");
	
	$.ajax({
		url : 'subcategorydata.php',
		type : 'GET',
		data : 'id=' + id,
		success : function(result) {

				$("#editsubcat").html(result);

			}
	});
}

</script> 
<script>
$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

    $('a[data-modal-id]').click(function(e) {
        e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
        var modalBox = $(this).attr('data-modal-id');
        $('#'+modalBox).fadeIn($(this).data());
    }); 
 
 
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();
 
});
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
</body>
</html>
