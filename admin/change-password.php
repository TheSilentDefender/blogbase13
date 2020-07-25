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
<link rel="stylesheet" href="Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/themes/flat/style.css">
<?php

if (file_exists ( "Simple-Html-WYSIWYG-Editor-Plugin-with-jQuery-Cazary/cazary.js" ));
?>
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
                  <h4>Change Password</h4>
                </div>
									
	<div class="custom-panel-body">

      <form action="renew.php" method="post">
                    <label><span>Old Password</span>
                      <input id="Text2" type="text" name="oldpassword" placeholder="Password" />
                    </label>                    
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgoldpassword"></div></label>					
                    <div class="clearfix"></div>
                    <label><span>New Password </span>
                      <input type="text" name="newpassword" placeholder="New Password" />
                    </label>                     
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgnewpassword"></div></label>					
                    <div class="clearfix"></div>
                    <label><span>Confirm Password </span>
                      <input id="Text3" type="text" name="confirmpassword" placeholder="Confirm Password"/>
                    </label>                    
                    <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span><div class="message msgconfirmpassword"></div></label>					
                    <div class="clearfix"></div>
                    
                    <input type="submit" id="Text2" class="button tiny radius coral-bg right changepassword" value="Add">
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
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="js/common.js"></script> 

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
<script type="text/javascript">






function ispassValidation() {
//alert("hiiiiii");
	var valid = true;
   
	var password = $("#password").val();
	var rpassword = $("#rpassword").val();
	var cpassword = $("#cpassword").val();
$(".message").css("color","red");
$(".message").css("font-size","15px");
	
	if (password.length == 0) {
		valid = false;
		$("#pass").html(" Please input password.");
                $("#pass").css("color","red");
	} 
	if (rpassword.length == 0) {
	
		valid = false;
		$("#rpass").html(" Please input New password.");
                 $("#rpass").css("color","red");
	} 
	 if (rpassword.length <= 7) {
		valid = false;
		$("#rpass").html("New Password to short.");
                $("#rpass").css("color","red");
	}
	
	if (cpassword.length == 0) {
			valid = false;
			$("#cpass").html(" Please input confirmation password.");
                        $("#cpass").css("color","red");
		}
	 
	  if (rpassword != cpassword) {
		valid = false;
		$("#cpass").html(" Mis match password.");
                $("#cpass").css("color","red");
	}

	 
	return valid;
}





</script>
 

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="../js/jquery.themepunch.tools.min.js"></script>
    <script src="../js/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript" src="../js/plugins.js"></script>
	<script type="text/javascript" src="../js/custom.js"></script>
<script>
$(document).ready(function(){
   $(document).ready(function(){
       $("#changepass").addClass("active");
   });
});
</script>
</body>
</html>
