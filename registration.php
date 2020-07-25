 <?php
extract($_POST);
if(isset($signup))
{
	$que = "select * from register where email='$email'";
	$run = mysql_query ( $que );

	$count = mysql_num_rows ( $run );
	if ($count == 0)
	{
	
	/*	$query = "insert into register set fname='$fname',lname='$lname',email='$email',
		mobile='$mob',address='$address',area='$area',
		city='$city',state='$state',country='$country',post='$post',password='$pass',
		confirm='$cpass',new_letter='$post',date=now(),status='inactive'";
	*/
	
	$query="insert into register(fname,lname,email,mobile,address,area,city,state,country,post,password,confirm,new_letter,date,status) 
	values('$fname','$lname','$email','$mob','$address','$area','$city','$state','$country','$post','$pass',
	'$cpass','$post',now(),'inactive')";
	
	
	$run = mysql_query ( $query );
	$_SESSION['email']=$email;
	header('location:index.php');
	
	}
	else 
	{
	$err= 'This user already exists</h3>';
	}
}

?>

 <!-- Modal content-->
      <div class="modal-content">
	  <h3 align="center" style="color:red"><?php echo @$err; ?></h3>
        <div class="modal-header">
          <h4 class="modal-title text-center">Registration Form</h4>
        </div>
        <div class="modal-body">
          <div>
              <form action="" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="Your name.." required pattern="[a-z]*">
                
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" placeholder="Your last name.." required pattern="[a-z]*">
                	
                    <label for="lname">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email.." required>
                    
                    <label for="lname">Mobile</label>
                    <input type="text" id="mob" name="mob" placeholder="Your mobile no.." required pattern="[0-9]*">
                    
                    <label for="lname">Address</label>
                    <textarea type="text" class="form-control"  name="address" required></textarea>
                    
                    
                    <label for="country">Country</label>
                    <select id="country" name="country" required>
                      <option value="australia">Australia</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                    </select>
                  
					<label for="state">State</label>
                    <select id="state" name="state" required>
                      <option value="australia">Delhi</option>
                      <option value="canada">UP</option>
                      <option value="usa">Punjab</option>
                    </select>
					
                    <label for="city">City</label>
                    <select id="country" name="city" required>
                      <option value="australia">Australia</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                    </select>
                    <label for="area">Area</label>
                    <select id="area" name="area" required>
                      <option value="australia">Australia</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                    </select>
                  	
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="password.." required>
                    
                    
                    <label for="cpass">Confirm Password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="confirm password.." required>
                    
                    <label for="post">Post</label>
                    <textarea type="text" class="form-control" name="post" required></textarea>
                    
                    
                    <input type="submit" value="Sign Up" name="signup">
              </form>
		</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>