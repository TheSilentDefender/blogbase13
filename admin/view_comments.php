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
                <div class="custom-panel-body">
                  <table class="width-100 custom-table responsive">
                    <thead>
                      <tr>
                        <td>S. No.</td>
                        <td>News</td>
                        <td>User</td>
                        <td>Comments</td>
						<td>Date</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
  $count1=1;
        $userQ="select * from comments inner join news on comments.news_id=news.id";
		$userRes=mysql_query($userQ) or die(mysql_error());
		if($count=mysql_num_rows($userRes)){
		while ($userRow=mysql_fetch_assoc($userRes))
			{
				$user=mysql_query("select email from register where id='".$userRow['user_id']."'");
				$userRec=mysql_fetch_array($user);

?>
                      <tr>
                        <td><?php echo $count1++; ?>.</td>
                        <td><?php echo $userRow['product_name']; ?></td>
                        <td><?php echo $userRec['email']; ?></td>
						<td><?php echo $userRow['message']; ?></td>
                        <td><?php echo $userRow['comment_date']; ?></td>
          <td><a class="alert label js-open-modal btn editsubcat" href="edit_comments.php?id=<?php echo $userRow['c_id'];?>"> Edit</a>
                        
                         <a onClick="return confirm('Are you sure you want to delete?')" 
						 href="delete_comments.php?id=<?php echo $userRow['c_id'];?>" class="label"> Delete</a>
                        
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
</body>
</html>
