<?php
extract($_POST);
	if(isset($login))
	{
		$que = "select * from register where email='$email'  and password='$pass'";
			$run = mysql_query ( $que );
			
		$user = mysql_num_rows ( $run );
		if($user>0)
		{
			$_SESSION['email']=$email;
			header('location:index.php');
		}
		else
		{
			$err1= "<font color='#F58D8F'>Please enter correct email-id or password</font>";
		}
	}
	?>

<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User-Login(Only for registred users)</h4>
        </div>
        <div class="modal-body">
          <div>
              <form action="" method="post" id="loginform">
              <div class="form-group"><span id="err"><?php echo @$err1;?></span>
</div>
			  <div class="form-group">
			                      <label>Email</label>
                    <input type="email" class="form-control" autocomplete="off" id="email" name="email" 
					placeholder="Your Email.." required>
               </div> 
               <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" autocomplete="off"
					id="password" name="pass" placeholder="Your Password.." required>
                </div>
                    <input type="submit" id="submit" style="width:150px" value="Login" name="login">
              </form>
		</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      