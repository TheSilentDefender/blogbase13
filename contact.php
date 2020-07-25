<?php
extract($_POST);

$statusMsg = '';
if(isset($send))
{
    // Get the submitted form data
    $email = ($email);
    $name = ($name);
    $subject = ($subject);
    $message = ($message);
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message))
	{
			   // Check for a proper First name
		  if (!empty($name))
			  {
				$pattern = "/^[a-zA-Z0-9\_]{2,20}/";//checks if the name is valid characters
					if (preg_match($pattern,$name))
					{
						$name = ($name);
					}
					else
					{
						$statusMsg = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';
					}
				}
			
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				$statusMsg = 'Please enter your valid email.';	
			}
		else
		{
            // Recipient email
            $toEmail = 'your_email@gmail.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers))
			{
				mysql_query("insert into contact values('','$name','$email','$mob','$subject','$message',now())");	
                $statusMsg = 'Your contact request has been submitted successfully !';
              
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
               
            }
        }
    }
	else
	{
        $statusMsg = 'Please fill all the fields.';
       
    }
}
?>

          

	<h3>Contact Us</h3>
	<hr></hr>
		<?php if(!empty($statusMsg)){ ?>
        <p><?php echo "<h3><font color='blue'>".$statusMsg."</font></h3>"; ?></p>
    <?php } ?>
    <form action="" method="post">
        <h4>Name</h4>
        <input type="text" class="form form-control" name="name" placeholder="Your Name" required="">
        <h4>Email </h4>
        <input type="email" class="form form-control" name="email" placeholder="email@example.com" required="">
		
		<h4>Mobile </h4>
        <input type="text" class="form form-control" name="mob" placeholder="" required="">
		
        <h4>Subject</h4>
        <input type="text" class="form form-control" name="subject" placeholder="Write subject" required="">
        <h4>Message</h4>
        <textarea name="message" class="form form-control" rows="8" placeholder="Write your message here" required> </textarea>
      <input type="submit" style="float:left;margin:8px 0px 0px 2px;width:10%;padding:9px;" name="send" value="Send">
      
    </form>

	
	
	