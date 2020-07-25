<?php
/*
extract($_POST);
if(isset($signup))
{
	$que = "select * from register where email='$email'";
$run = mysql_query ( $que );

$count = mysql_num_rows ( $run );
if ($count == 0)
	{
	
	$query = "insert into register set fname='$fname',lname='$lname',email='$email',mobile='$mob',address='$address',area='$area',city='$city',state='$state',country='$country',post='$post',password='$pass',confirm='$cpass',new_letter='$post',date=now(),status='inactive'";
	
	$run = mysql_query ( $query );
	$_SESSION['email']=$email;
header('location:index.php');
	//echo 'Added Successfully !';
	
}
 else {
	header('location:index.php');
	echo 'Already Exist';
	}

}
*/

?>
<nav class="navbar navbar-inverse" style="background:#000000;border:0px">
    <div class="container-fluid">
        	  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
         <ul class="nav navbar-nav" id="header" style="padding:0px 1px;"> 
         <li><a href="index.php" class="black" style='color:#fff'>Home</a></li>      
           <?php 
		  		$que = "select * from category where status='active'";
				$res = mysql_query ($que) or die (mysql_error());
				while($r=mysql_fetch_array($res))
				{ $id=$r['id'];
          
           	echo "<li class='dropdown' style='color:#fff'>
			<a href='index.php?page=category&cid=$cid' style='color:#fff' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>".$r['category']."<span class='caret'></span></a>"; 
		  ?>
          <ul class="dropdown-menu" style='color:#fff'>
          
          <?php 
		  		
					
					$que1="select * from subcategory where category='$id' and status='active'";
					$res1=mysql_query ($que1) or die (mysql_error());
					while($r1=mysql_fetch_array($res1))
					{
						$id=$r1['id'];
						echo "<li role='presentation'><a  role='menuitem' tabindex='-1' href='index.php?page=headlines&id=$id'>".$r1['subcategory']."</a></li>";
					}
				
			
		  ?>
           
            <!--<li role="separator" class="divider"></li>
            <li><a href="#">Educational</a></li>
            <li role="separator" class="divider"></li>-->
           
          </ul>
          <?php
				}
			?>
          </li>
         	<li><a href="index.php?page=flip" class="black" style='color:#fff'>Flip News</a></li>
           <li><a href="index.php?page=archive" class="black" style='color:#fff'>Archive</a></li>
           <li><a href="index.php?page=contact" class="black" style='color:#fff'>Contact Us</a></li>
		   <li><a href="index.php?page=gallery" class="black" style='color:#fff'>Image Gallery</a></li>	
       </ul>
                    

      
	 <ul class="nav navbar-nav navbar-right" style="padding:6px;">;
       <?php if(isset($_SESSION['email']))
	   {?>
			<li class='dropdown'>
		<a href='' class='dropdown-toggle' style='color:#fff' data-toggle='dropdown' role='button' aria-haspopup='true'
		aria-expanded='false'>Hello <?php echo $_SESSION['email']; ?><span class='caret'></span></a>			
			
				<ul class="dropdown-menu" style="background:red">
				 
		   <li>
			<a href='logout1.php'  style='text-decoration:none;color:white;'>Logout</a>
		   </li>&nbsp; 
		   <li>
			<a href='index.php?page=changePass' style='text-decoration:none;color:white;'>Change Password</a>
		   </li>
			</ul>
		</li>	
		   
		  <?php  
	   }
	   else{
		   ?>
		   	<li><a href="index.php?page=login" class="black" style='color:#fff'>Login</a></li>
			<li><a href="index.php?page=registration" class="black" style='color:#fff'>Registration</a></li>		
		   
		   <?php 
	   }
	   ?>
	   
	   
        
        <!--<li style="padding-top:5px"><input type="search" style="width:35px;" class="form-control" placeholder="Search Article.."></li>
-->
     </ul>  

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
 

    
  
</div>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery.validate.js"></script>

 <script src="js/jquery.validate.min.js"></script>
  <script src="js/validation.js"></script>