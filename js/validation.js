$().ready(function() {
	
	$("#loginform").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true,
				minlength: 5
			},
		},
		messages:{
			email:{
				required:'<font color="sky blue">Please enter an email address</font>',
				email:'<font color="red">Please enter a valid email address.</font>'
			},
			password:{
				required:'<font color="sky blue">Please provide a password</font>',
				minlength:'<font color="red">Your password must be at least 5 characters long.</font>'
			},
		},
	});
	
	// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
					name: {
					required: true,
					minlength: 2
					},
					
					father: {
					required: true,
					minlength: 2
				},
					mother: {
					required: true,
					minlength: 2
				},
				
				email: {
					required: true,
					email: true
				},
				
				
			},
			messages: {
				name: "Please enter your firstname",
				father: {
					required: "Please enter a father's name",
					minlength: "Your father's name must consist of at least 3 characters"
				},
				mother: {
					required: "Please enter a mother's name",
					minlength: "Your mother's name must consist of at least 3 characters"
				},
				
				email: "Please enter a valid email address",
				
			}
		});
	
	/*$("#submit").click(function(){
		var email=$('#email').val();
		var password=$('#password').val();
		//alert(email);
		$.post("login.php",{email:email,password:password},function(data){
			$("#err").html(data);
		});
});*/
});