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
                <?php include 'menu.php';?>
                	<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
					
						<div id="dashboard">
						   
							<div class="row">
								<div class="large-12 columns">
									<div class="custom-panel">
										<div class="custom-panel-heading">
											<h4 style="color:red">Add Flip Pages</h4>
										</div>
										<div class="custom-panel-body">
											<form action="insert_flip.php" method="post" enctype="multipart/form-data">
											
										<label> <span>Title :</span> <input type="text" name="title" placeholder="Title" required
										 />
									</label>
                                    <label> <span>upload Image :</span> <input type="file" name="img" placeholder="Flip Newspaper" required
										 />
									</label>
											<!--<label><span>Content </span> <textarea placeholder="Content" name="content" required></textarea></label>-->
											<label><span>&nbsp;</span><input type="submit" id="Text2" class="button tiny radius coral-bg right" value="Add"></label>
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
