<?php include 'include/session_check.php';

include '../config.php';


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300'
	rel='stylesheet' type='text/css'>
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
									<div class="custom-panel-body">
<a class="button tiny radius success lable js-open-modal btn" href="category.php" >Add  Category</a><br><br/>

										<table class="width-100 custom-table responsive">
											<thead>
												<tr>
													<td>S. No.</td>
													<td>Category</td>
													
													<td>Actions</td>
												</tr>

											</thead>

											<tbody>
  <?php
  $count1=1;
        $userQ="select * from category";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count=mysql_num_rows($userRes)){
		while ($userRow=mysql_fetch_assoc($userRes)) {
  ?> 
<tr>
<td><?php echo $count1++; ?></td>
<td><?php echo ucfirst($userRow['category']); ?></td>
<td> 
<a class="alert label btn" href="editcategory.php?id=<?php echo $userRow['id'];?>">Edit</a> 
<?php if ($userRow ['status'] == 'active'){?>
<a class="label success" href="cat_status.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Active</a>
<?php }else{?>
<a class="alert label" href="cat_status.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Inactive</a>
<?php }?>
</td>
</tr>

  <?php
		}}else{
			echo "<tr><td colspan='9'>No Data....</td></tr>";
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





	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){

$(".categorydata").click(categoryData);

});
function categoryData(){
	var id=$(this).attr("rel");
	$.ajax({
		url : 'editcategory.php',
		type : 'GET',
		data : 'id=' + id,
		success : function(result) {

				$("#editcategory").html(result);

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
	
</body>
</html>
