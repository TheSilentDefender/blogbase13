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
											<h4>Edit Main Banner</h4>
										</div>
										
	<?php
	
	extract($_POST);
	if(isset($submit))
	{
		$size=$_FILES['pic']['size'];
		if($size<=49167)
		{
			
		move_uploaded_file($_FILES['pic']['tmp_name'],"../assets/images/sliders/".$_FILES['pic']['name']);
		$picture=$_FILES['pic']['name'];
		$sql="insert into mainbanner (h1,h2,h3,img) values('".$h1."','".$h2."','".$h3."','".$picture."')";
		mysql_query($sql);
		}
		else
		{
			echo "uploaded image should be 1350x70(pixels)";
		}
	}
	
	?>
										
							<form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype='multipart/form-data'>
								<input type='text' name='h1' placeholder='Enter Heading 1' required/>
								<input type='text' name='h2' placeholder='Enter Heading 2' required/>
								<input type='text' name='h3' placeholder='Enter Heading 3' required/>
								<input type='file' name='pic' required/>
								<input type='submit' name='submit' />
							</form>							
									</div>
								</div>                            
							</div>
						</div>
					</div>
                
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
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
</body>
</html>
