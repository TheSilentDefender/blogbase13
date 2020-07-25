<?php
$e=$_SESSION['email'];
extract($_POST);
if(isset($update))
{
	
	//$opass=md5($opass);
	$npass=($npass);
	$cpass=($cpass);
	
	if($opass=="" || $npass=="" || $cpass=="" )
	{
	$err="<font color='red'>please enter your old or new password.</font>";
	}
	else
	{
	
		$que=mysql_query("select * from  register where email='$e'") or die(mysql_error());
		
		$res=mysql_fetch_array($que);
		$pass=$res['password'];
		
		
		if(mysql_num_rows($que)>0)
		{	
			if($opass!=$pass)
			{
				$err="<font color='green'>Old Password Does Not Match</font>";	
			}
			elseif($npass==$cpass)
			{
				//$npass=md5($npass);
				mysql_query("update register SET password='$npass' where email='$e'")  or die ( mysql_error () );
				$err="<font color='green'>Password Successfully Reset</font>";
			//header('location:dashboard.php');
			}
			else
			{
				$err="<font color='red'>Confirm Password Does Not Match</font>";
			}
		}
   }
}

?>

 
                  <form class="form-horizontal"  method="post" >
    <fieldset>      
                        <div class="table-responsive">
                             <table class="table table-bordered" style="background-color:#F8F8F8;color:black">
                                <thead>
		 <tr>
			<td colspan="2"><?php echo  @$err; ?></td>
		</tr>

         <tr>
            <th>Enter your old password:</th>
            <td><input class="form form-control" type="password" name="opass"/></td>
         </tr>
		 <tr>
            <th>Enter your New Password:</th>
            <td><input class="form form-control" type="password" name="npass"/></td>
         </tr>
		 
         <tr><th>Re-Enter your New password:</th>
            <td><input class="form form-control"  type="password" name="cpass"/></td>
		 </tr>
         

		 
		 <tr><td colspan="2" align="center"><input class="button" type="submit" value="Update" name="update"/></td>
         </tr>
	</tbody>
</table>
  </fieldset>
  </form>
  