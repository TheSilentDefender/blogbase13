<?php
include('config.php');

	
?>
<link href="#" rel="stylesheet" type="text/css">

<title>Comment Box</title>
<script src="js/jquery.min.js"></script>
<script>

	function commentSubmit(){
		
		if(form1.email.value == '' || form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var email = form1.email.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert_comment.php?email='+email+'&comments='+comments, true); //open and send http request
		xmlhttp.send();
	}

	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			
			setInterval(function() {$('.comment_logs').load('show_comment.php');}, 2000);
		});
		
</script>
	
    <div class="comment_input">
        <form name="form1" id="form1">
        	<input type="hidden"   value="<?php echo $_SESSION['email'];?>" name="email" placeholder="email id..."/></br></br>
            <textarea name="comments" rows="5" placeholder="Leave Comments Here..." class="form-control "></textarea></br></br>
            <a href="#" onClick="commentSubmit()" style="text-decoration:none;" class="button" >Post</a></br>
        </form>
    </div>
 