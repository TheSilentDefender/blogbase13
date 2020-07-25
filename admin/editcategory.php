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
                  <h4>Edit Category</h4>
                </div>
                <?php
	
	$id = $_REQUEST ['id'];
	
      $userQ="select * from category where id='$id'";
		$userRes=mysql_query($userQ) or die(mysql_error());
		$userRow=mysql_fetch_assoc($userRes);

		//print_r($userRow);
	
	
	?>
                <div class="custom-panel-body">
                  <form action="update_category.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                    <label> <span>Category :</span>
                      <input type="text" name="category" value="<?php echo $userRow['category']; ?>" required="required">
                    </label>
                    <label> <span>Image1</span>
                      <input type="file"
								name="pic" accept=".jpg, .jpeg,.png"/>
                    </label>                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgpic1"></div></label>					<div class="clearfix"></div>
                    <label> <span>Image1</span> <img src="../uploadimage/<?php echo $userRow['pic'];?>"
								width="100px" height="90px" /> </label>
                    
                    <input type="submit" class="button tiny radius coral-bg right" name="submit" value="Update Category">
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
