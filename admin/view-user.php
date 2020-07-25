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
                    <div class="row">
                        <div class="large-10 columns">
                            <div class="page-name">
                                <h3 class="left">Register Manufacturers</h3>
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

                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Phone</td>
                                                <td>Address</td>
                                                
                                                <td>Actions</td>
                                                
                                            </tr>
                                        
                                        </thead>
                                        
                                        <tbody>
  <?php
  $count=1;
        $userQ="select * from manufacturers order by id desc";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count=mysql_num_rows($userRes)){
		while ($userRow=mysql_fetch_assoc($userRes)) {

		//print_r($userRow);

		
		
  ?> 


  <tr>
    <td><?php echo $count++; ?>.</td>
    <td><?php echo ucwords($userRow['fname']." ".$userRow['lname']); ?></td>
   <td><?php echo $userRow['email']; ?></td>
      <td><?php echo $userRow['phone']; ?></td>
      <td><?php echo $userRow['address']; ?></td>

     <td> <?php
		if ($userRow ['status'] == 'active') {
			?><a class="label success" href="userstatus.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Active</a>
	<?php
		} else {
			?><a class="alert label" href="userstatus.php?id=<?php echo $userRow['id'];?>&status=<?php echo $userRow['status'];?>">Inactive</a>
<?php
		}
		?>

		

</td>
  </tr>
  <?php
		}}else{
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
