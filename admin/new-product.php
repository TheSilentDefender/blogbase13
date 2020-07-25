<?php 
@ob_start ();
@session_start ();
error_reporting(0);

include 'include/session_check.php';

include_once '../config.php';


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300'
	rel='stylesheet' type='text/css'>
<?php include 'title.php';?>
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
      <div
					class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
          <div class="large-10 columns">
            <div class="page-name">
              <h3 class="left">Trend</h3>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div id="inbox">
          <div class="row">
            <div class="large-12 columns">
              <div class="custom-panel blue-bg">
                <div class="custom-panel-body">
                  <table class="width-100 custom-table responsive">
                    <thead>
                      <tr>
                        <td>S. No.</td>
                        <td>Headline</td>
                        <td>Link</td>
                        <td>Image</td>
 <td>Size</td>
                        <td>Date</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
						  $count1=1;
						        $userQ="select * from new_trend";
								$userRes=mysql_query($userQ) or die(mysql_error());
								if($count=mysql_num_rows($userRes)){
								while ($userRow=mysql_fetch_assoc($userRes)) {
						  ?>
                      <tr>
                        <td><?php echo $count1++; ?></td>
                        <td><?php echo $userRow['headline']; ?></td>
                        <td><a href="<?php echo $userRow['link'];?>" target="_blank">Link</a></td>
                        <td><img src="../uploaded_product/<?php echo $userRow['pic'];?>" width="50px"/></td>
<td><?php echo $userRow['size']; ?></td>
                        <td><?php echo $userRow['date']; ?></td>
                        <td><a  href="edit-trend.php?id=<?php echo $userRow['id'];?>" class="alert label js-open-modal btn ">Edit</a>
                          </td>
                      </tr>
                      <?php }}else{ echo "<tr><td colspan='9'>No Data....</td></tr>";}?>
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
	$("#cat").css("background","#eee");
	$("#cat").css("color", "#f16c65");

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
