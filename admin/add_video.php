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
</head>
<body>
    <div class="row full-width wrapper">
        <div class="large-12 columns content-bg">
            <?php include 'include/header.php';?>
            <div class="row">
                <?php include 'menu.php';
				extract($_POST);
				if(isset($upload))
				{
					$video=$_FILES['video']['name'];
					move_uploaded_file($_FILES['video']['tmp_name'],"../video/".$_FILES['video']['name']);
					mysql_query("insert into video values('','$subject','$video','$des','active',now())");
					$msg= "<h3>Video Uploaded Successfully</h3>";
					
				}
					?>
                	<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
					
						<div id="dashboard">
						   
							<div class="row">
								<div class="large-12 columns">
									<div class="custom-panel">
										<div class="custom-panel-body">
										<Center><font color="green"><?php echo @$msg; ?></font></center>
											<form action="" method="post" enctype="multipart/form-data">
											
									<label> <span> Subject :</span> <input class="form-control" type="text" name="subject"
										placeholder="Subject" required
										 />
									</label>
									
									<label> <span>Description :</span> <textarea name="des"></textarea>
									</label>
									
									<label> <span>Upload Video :</span> <input type="file" name="video"
										 required
										 />
									</label>
									
											<!--<label><span>Content </span> <textarea placeholder="Content" name="content" required></textarea></label>-->
											<label><span>&nbsp;</span><input type="submit" id="Text2"
											class="button tiny radius coral-bg" name="upload" value="Add New Video"></label>
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
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        <script>
  $(function() {
    $( "#datepicker" ).datepicker();
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
